/* chatbot.js - Index-only GNPS counselor assistant */

document.addEventListener('DOMContentLoaded', () => {
    const widget = document.getElementById('gnpsChatWidget');
    const launcher = document.getElementById('gnpsChatLauncher');
    const panel = document.getElementById('gnpsChatPanel');
    const closeBtn = document.getElementById('gnpsChatClose');
    const messages = document.getElementById('gnpsChatMessages');
    const suggestionsWrap = document.getElementById('gnpsChatSuggestions');
    const form = document.getElementById('gnpsChatForm');
    const input = document.getElementById('gnpsChatInput');
    const attachBtn = document.getElementById('gnpsChatAttach');
    const heroSection = document.getElementById('hero');
    const footer = document.querySelector('.footer');

    if (!widget || !launcher || !panel || !messages || !suggestionsWrap || !form || !input) {
        return;
    }

    // Keep panel non-focusable while closed for better accessibility.
    panel.setAttribute('inert', '');

    const state = {
        initialized: false,
        admissionGuideActive: false,
        admissionStepIndex: 0,
        fallbackCount: 0,
        typingNode: null,
        offlineMode: !navigator.onLine
    };

    const defaultSuggestions = [
        { label: 'Courses Offered', query: 'Courses offered' },
        { label: 'Admission Process', query: 'Admission process' },
        { label: 'Fees Details', query: 'Fees details' },
        { label: 'Contact Support', query: 'Contact support' }
    ];

    const admissionStepSuggestions = [
        { label: 'Next Step', query: 'Next step' },
        { label: 'Documents Required', query: 'Documents required' },
        { label: 'Fees Details', query: 'Fees details' },
        { label: 'Contact Support', query: 'Contact support' }
    ];

    const admissionSteps = [
        'Step 1: Select your preferred course (ANM, GNM, or B.Sc Nursing).',
        'Step 2: Check eligibility and keep your basic documents ready.',
        'Step 3: Fill the Apply Online form with accurate details.',
        'Step 4: Wait for admission office verification and final confirmation.'
    ];

    function scrollMessagesToBottom() {
        messages.scrollTop = messages.scrollHeight;
    }

    function addMessage(text, role, options = {}) {
        const bubble = document.createElement('div');
        bubble.className = `gnps-chat-bubble ${role === 'user' ? 'user' : 'bot'}`;
        bubble.textContent = text;

        if (options.contactButton) {
            const actions = document.createElement('div');
            actions.className = 'gnps-chat-actions';
            const contactBtn = document.createElement('a');
            contactBtn.className = 'gnps-chat-contact-btn';
            contactBtn.href = 'contact.php';
            contactBtn.textContent = 'Open Contact Support';
            actions.appendChild(contactBtn);
            bubble.appendChild(actions);
        }

        messages.appendChild(bubble);
        scrollMessagesToBottom();
    }

    function showTyping() {
        hideTyping();
        const typing = document.createElement('div');
        typing.className = 'gnps-chat-typing';
        typing.innerHTML = '<span></span><span></span><span></span>';
        state.typingNode = typing;
        messages.appendChild(typing);
        scrollMessagesToBottom();
    }

    function hideTyping() {
        if (state.typingNode && state.typingNode.parentNode) {
            state.typingNode.parentNode.removeChild(state.typingNode);
        }
        state.typingNode = null;
    }

    function renderSuggestions(list) {
        suggestionsWrap.innerHTML = '';
        list.forEach((item) => {
            const chip = document.createElement('button');
            chip.type = 'button';
            chip.className = 'gnps-chat-chip';
            chip.textContent = item.label;
            chip.dataset.query = item.query;
            chip.addEventListener('click', () => {
                handleQuery(item.query);
            });
            suggestionsWrap.appendChild(chip);
        });
    }

    function openChat() {
        widget.classList.add('is-open');
        launcher.setAttribute('aria-expanded', 'true');
        panel.removeAttribute('inert');
        panel.setAttribute('aria-hidden', 'false');

        if (!state.initialized) {
            state.initialized = true;
            addMessage("Hello! I'm your Nursing College Assistant.", 'bot');
            addMessage('Ask about courses, admission, fees, facilities, or contact support.', 'bot');
            if (state.offlineMode) {
                addMessage('Offline mode is active. I can still answer common questions.', 'bot');
            }
            renderSuggestions(defaultSuggestions);
        }

        input.focus();
    }

    function closeChat(shouldReturnFocus = true) {
        if (panel.contains(document.activeElement)) {
            launcher.focus({ preventScroll: true });
        } else if (shouldReturnFocus && document.activeElement !== launcher) {
            launcher.focus({ preventScroll: true });
        }

        widget.classList.remove('is-open');
        launcher.setAttribute('aria-expanded', 'false');
        panel.setAttribute('aria-hidden', 'true');
        panel.setAttribute('inert', '');
    }

    function updateVisibilityByScroll() {
        if (!heroSection || !footer) {
            widget.classList.add('is-visible');
            return;
        }

        const heroBottom = heroSection.offsetTop + heroSection.offsetHeight;
        const footerTop = footer.offsetTop;
        const scrollY = window.scrollY || window.pageYOffset;
        const viewportHeight = window.innerHeight;

        const hasPassedHero = scrollY > (heroBottom - 90);
        const beforeFooter = (scrollY + viewportHeight) < (footerTop - 50);
        const shouldShow = hasPassedHero && beforeFooter;

        widget.classList.toggle('is-visible', shouldShow);

        if (!shouldShow && widget.classList.contains('is-open')) {
            closeChat(false);
        }
    }

    function nextAdmissionStepResponse() {
        if (state.admissionStepIndex < admissionSteps.length) {
            const reply = admissionSteps[state.admissionStepIndex];
            state.admissionStepIndex += 1;

            if (state.admissionStepIndex >= admissionSteps.length) {
                state.admissionGuideActive = false;
                return {
                    reply: `${reply} Guide complete. For personal help, open Contact Support.`,
                    suggestions: [
                        { label: 'Contact Support', query: 'Contact support' },
                        { label: 'Main Menu', query: 'Main menu' }
                    ],
                    needsContact: true,
                    intent: 'admission-step'
                };
            }

            return {
                reply,
                suggestions: admissionStepSuggestions,
                needsContact: false,
                intent: 'admission-step'
            };
        }

        state.admissionGuideActive = false;
        return {
            reply: 'Admission guide is complete. Please use Contact Support for final help.',
            suggestions: [
                { label: 'Contact Support', query: 'Contact support' },
                { label: 'Main Menu', query: 'Main menu' }
            ],
            needsContact: true,
            intent: 'admission-step'
        };
    }

    function localOfflineResponse(query) {
        const q = query.toLowerCase();

        if (q.includes('main menu') || q === 'menu') {
            state.admissionGuideActive = false;
            state.admissionStepIndex = 0;
            return {
                reply: 'Main menu is ready. Choose a topic to continue.',
                suggestions: defaultSuggestions,
                needsContact: false,
                intent: 'menu'
            };
        }

        if (q.includes('next step') && state.admissionGuideActive) {
            return nextAdmissionStepResponse();
        }

        if (q.includes('admission') || q.includes('apply') || q.includes('registration')) {
            state.admissionGuideActive = true;
            state.admissionStepIndex = 0;
            return {
                reply: 'I can guide admission step-by-step. Select Next Step to continue.',
                suggestions: admissionStepSuggestions,
                needsContact: false,
                intent: 'admission'
            };
        }

        if (q.includes('anm')) {
            return {
                reply: 'ANM is a foundational nursing course with practical training. For exact intake and timelines, please verify with admission support.',
                suggestions: [
                    { label: 'Admission Process', query: 'Admission process' },
                    { label: 'Documents Required', query: 'Documents required' },
                    { label: 'Main Menu', query: 'Main menu' }
                ],
                needsContact: false,
                intent: 'anm'
            };
        }

        if (q.includes('gnm')) {
            return {
                reply: 'GNM combines classroom learning with strong clinical exposure to build hospital-ready skills.',
                suggestions: [
                    { label: 'Admission Process', query: 'Admission process' },
                    { label: 'Fees Details', query: 'Fees details' },
                    { label: 'Main Menu', query: 'Main menu' }
                ],
                needsContact: false,
                intent: 'gnm'
            };
        }

        if (q.includes('bsc') || q.includes('b.sc')) {
            return {
                reply: 'B.Sc Nursing is an advanced degree pathway with deeper academic and clinical learning.',
                suggestions: [
                    { label: 'Admission Process', query: 'Admission process' },
                    { label: 'Fees Details', query: 'Fees details' },
                    { label: 'Main Menu', query: 'Main menu' }
                ],
                needsContact: false,
                intent: 'bsc'
            };
        }

        if (q.includes('course') || q.includes('courses')) {
            return {
                reply: 'Courses available: ANM, GNM, and B.Sc Nursing. Select a course option for focused details.',
                suggestions: [
                    { label: 'ANM Details', query: 'ANM details' },
                    { label: 'GNM Details', query: 'GNM details' },
                    { label: 'B.Sc Nursing', query: 'B.Sc details' },
                    { label: 'Main Menu', query: 'Main menu' }
                ],
                needsContact: false,
                intent: 'courses'
            };
        }

        if (q.includes('document') || q.includes('certificate') || q.includes('marksheet') || q.includes('id proof')) {
            return {
                reply: 'Common documents: photos, ID proof, marksheets, and migration/transfer documents if applicable.',
                suggestions: [
                    { label: 'Admission Process', query: 'Admission process' },
                    { label: 'Contact Support', query: 'Contact support' },
                    { label: 'Main Menu', query: 'Main menu' }
                ],
                needsContact: false,
                intent: 'documents'
            };
        }

        if (q.includes('fee') || q.includes('fees') || q.includes('payment')) {
            return {
                reply: 'Fees may change by session. For exact and latest fee structure, please use Contact Support.',
                suggestions: [
                    { label: 'Contact Support', query: 'Contact support' },
                    { label: 'Admission Process', query: 'Admission process' },
                    { label: 'Main Menu', query: 'Main menu' }
                ],
                needsContact: true,
                intent: 'fees'
            };
        }

        if (q.includes('facility') || q.includes('facilities') || q.includes('lab') || q.includes('hostel') || q.includes('library') || q.includes('campus')) {
            return {
                reply: 'Campus support includes practical labs, academic guidance, and student-focused facilities.',
                suggestions: [
                    { label: 'Courses Offered', query: 'Courses offered' },
                    { label: 'Contact Support', query: 'Contact support' },
                    { label: 'Main Menu', query: 'Main menu' }
                ],
                needsContact: false,
                intent: 'facilities'
            };
        }

        if (q.includes('scholarship') || q.includes('financial aid')) {
            return {
                reply: 'Scholarship support is eligibility-based. Please verify current cycle rules with the admissions team.',
                suggestions: [
                    { label: 'Contact Support', query: 'Contact support' },
                    { label: 'Admission Process', query: 'Admission process' },
                    { label: 'Main Menu', query: 'Main menu' }
                ],
                needsContact: false,
                intent: 'scholarship'
            };
        }

        if (q.includes('exam') || q.includes('result')) {
            return {
                reply: 'Exam schedules and results are published on dedicated pages. For personal status, please contact support.',
                suggestions: [
                    { label: 'Contact Support', query: 'Contact support' },
                    { label: 'Main Menu', query: 'Main menu' }
                ],
                needsContact: false,
                intent: 'exam'
            };
        }

        if (q.includes('contact') || q.includes('call') || q.includes('phone') || q.includes('email') || q.includes('map') || q.includes('address') || q.includes('location')) {
            return {
                reply: 'Contact: Sandalpur (Bazar Samiti), P.O.- Mahendru, P.S.- Bahadurpur, Patna - 800006. Email: gurudeocollegeofnursing@gmail.com',
                suggestions: [
                    { label: 'Open Contact Support', query: 'Contact support' },
                    { label: 'Main Menu', query: 'Main menu' }
                ],
                needsContact: true,
                intent: 'contact'
            };
        }

        return {
            reply: 'I can help with courses, admission, fees, facilities, and contact support. Please ask a specific question.',
            suggestions: defaultSuggestions,
            needsContact: false,
            intent: 'fallback'
        };
    }

    async function requestBackendResponse(query) {
        const response = await fetch('chatbot.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ message: query })
        });

        if (!response.ok) {
            throw new Error('Backend request failed');
        }

        return response.json();
    }

    async function getAssistantResponse(query) {
        if (state.offlineMode) {
            return localOfflineResponse(query);
        }

        try {
            const backend = await requestBackendResponse(query);
            if (backend && typeof backend.reply === 'string' && backend.reply.trim() !== '') {
                const suggestions = Array.isArray(backend.suggestions) && backend.suggestions.length
                    ? backend.suggestions.map((item) => ({
                        label: item.label || item.query || 'Suggestion',
                        query: item.query || item.label || 'Main menu'
                    }))
                    : defaultSuggestions;

                if (backend.intent === 'admission') {
                    state.admissionGuideActive = true;
                    state.admissionStepIndex = 0;
                }

                return {
                    reply: backend.reply,
                    suggestions,
                    needsContact: Boolean(backend.needsContact),
                    intent: backend.intent || 'fallback'
                };
            }
        } catch (error) {
            // Backend may be unavailable; continue with local offline logic.
        }

        return localOfflineResponse(query);
    }

    async function handleQuery(rawQuery) {
        const query = (rawQuery || '').trim();
        if (!query) return;

        addMessage(query, 'user');
        showTyping();

        await new Promise((resolve) => {
            window.setTimeout(resolve, 320);
        });

        const assistant = await getAssistantResponse(query);

        hideTyping();
        addMessage(assistant.reply, 'bot', { contactButton: assistant.needsContact });

        if (assistant.intent === 'fallback') {
            state.fallbackCount += 1;
        } else {
            state.fallbackCount = 0;
        }

        if (state.fallbackCount >= 2) {
            addMessage('I may not have the exact answer. Please use Contact Support for accurate help.', 'bot', { contactButton: true });
            renderSuggestions([
                { label: 'Contact Support', query: 'Contact support' },
                { label: 'Main Menu', query: 'Main menu' }
            ]);
            state.fallbackCount = 0;
            return;
        }

        renderSuggestions(assistant.suggestions && assistant.suggestions.length ? assistant.suggestions : defaultSuggestions);
    }

    launcher.addEventListener('click', () => {
        if (widget.classList.contains('is-open')) {
            closeChat();
        } else {
            openChat();
        }
    });

    closeBtn.addEventListener('click', closeChat);

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        const query = input.value;
        input.value = '';
        handleQuery(query);
    });

    if (attachBtn) {
        attachBtn.addEventListener('click', () => {
            addMessage('Attachment upload will be added soon. For document help, use Contact Support.', 'bot', { contactButton: true });
            renderSuggestions([
                { label: 'Documents Required', query: 'Documents required' },
                { label: 'Contact Support', query: 'Contact support' }
            ]);
        });
    }

    document.addEventListener('click', (event) => {
        if (!widget.classList.contains('is-open')) return;
        if (widget.contains(event.target)) return;
        closeChat(false);
    });

    window.addEventListener('online', () => {
        state.offlineMode = false;
    });

    window.addEventListener('offline', () => {
        state.offlineMode = true;
        addMessage('Connection is offline. I will continue with basic guidance mode.', 'bot');
        renderSuggestions(defaultSuggestions);
    });

    window.addEventListener('scroll', updateVisibilityByScroll, { passive: true });
    window.addEventListener('resize', updateVisibilityByScroll);
    window.addEventListener('orientationchange', updateVisibilityByScroll);
    window.addEventListener('pageshow', updateVisibilityByScroll);

    updateVisibilityByScroll();
});
