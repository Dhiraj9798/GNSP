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
    const sendBtn = form ? form.querySelector('.gnps-chat-send') : null;
    const attachBtn = document.getElementById('gnpsChatAttach');
    const heroSection = document.getElementById('hero');
    const footer = document.querySelector('.footer');

    if (!widget || !launcher || !panel || !messages || !suggestionsWrap || !form || !input) {
        return;
    }

    panel.setAttribute('inert', '');

    const BOT_REPLY_DELAY_MS = 2000;

    const state = {
        initialized: false,
        fallbackCount: 0,
        typingNode: null,
        offlineMode: !navigator.onLine,
        isTypingMessage: false,
        activePath: 'main',
        selectedCourse: '',
        admissionGuideActive: false,
        admissionStepIndex: 0
    };

    const courseCatalog = {
        anm: {
            title: 'A.N.M',
            summary: 'Career-focused entry-level nursing program for foundational patient care and community health practice.',
            fullName: 'Auxiliary Nurse Midwife',
            duration: '2 Years',
            eligibility: 'Passed 10+2 with a minimum of 50% aggregate marks (any stream)',
            level: 'Diploma'
        },
        gnm: {
            title: 'G.N.M',
            summary: 'Professional nursing diploma with stronger clinical exposure for hospital and community healthcare roles.',
            fullName: 'General Nursing and Midwifery',
            duration: '3 Years',
            eligibility: 'Passed 10+2 with a minimum of 50% aggregate marks (any stream)',
            level: 'Diploma'
        },
        bsc: {
            title: 'B.Sc Nursing',
            summary: 'Advanced undergraduate nursing degree with deep theory, labs, and structured clinical skill development.',
            fullName: 'Bachelor of Science in Nursing',
            duration: '4 Years',
            eligibility: '12th passed (10+2) with Biology, minimum 50% aggregate marks',
            level: 'Undergraduate',
            admissionBasis: 'Entrance-Based / Merit Based'
        }
    };

    const admissionFlowByCourse = {
        anm: [
            {
                title: 'Step 1 - Eligibility Check',
                text: 'Confirm 10+2 with at least 50 percent aggregate marks.'
            },
            {
                title: 'Step 2 - Document Desk Check',
                text: 'Keep marksheets, ID proof, photos, and migration or transfer certificate if applicable.'
            },
            {
                title: 'Step 3 - Form Submission',
                text: 'Submit admission form and wait for verification from the admission desk.'
            }
        ],
        gnm: [
            {
                title: 'Step 1 - Eligibility Check',
                text: 'Confirm 10+2 with at least 50 percent aggregate marks.'
            },
            {
                title: 'Step 2 - Document and Profile Review',
                text: 'Keep documents ready and complete profile verification at the admission desk.'
            },
            {
                title: 'Step 3 - Admission Form and Seat Process',
                text: 'Submit form, complete review, and proceed with seat confirmation guidance.'
            }
        ],
        bsc: [
            {
                title: 'Step 1 - PCB Eligibility Check',
                text: 'Confirm 10+2 with Biology and minimum 50 percent aggregate marks.'
            },
            {
                title: 'Step 2 - Entrance or Merit Screening',
                text: 'Follow current cycle mode for entrance-based or merit-based screening.'
            },
            {
                title: 'Step 3 - Counseling and Form Submission',
                text: 'Complete counseling steps and submit final admission form with verification.'
            }
        ]
    };

    const mainMenuSuggestions = [
        { label: 'Admission Process', query: 'Admission process' },
        { label: 'Course Menu', query: 'Course menu' },
        { label: 'Documents Required', query: 'Documents required' },
        { label: 'Fees Details', query: 'Fees details' },
        { label: 'Campus Facilities', query: 'Campus facilities' },
        { label: 'Scholarship', query: 'Scholarship' },
        { label: 'Contact Support', query: 'Contact support' }
    ];

    const admissionMenuSuggestions = [
        { label: 'A.N.M Admission Path', query: 'A.N.M admission path' },
        { label: 'G.N.M Admission Path', query: 'G.N.M admission path' },
        { label: 'B.Sc Admission Path', query: 'B.Sc admission path' },
        { label: 'Documents Required', query: 'Documents required' },
        { label: 'Main Menu', query: 'Main menu' }
    ];

    const courseMenuSuggestions = [
        { label: 'A.N.M Details', query: 'A.N.M details' },
        { label: 'G.N.M Details', query: 'G.N.M details' },
        { label: 'B.Sc Nursing Details', query: 'B.Sc Nursing details' },
        { label: 'Compare Courses', query: 'Compare courses' },
        { label: 'Main Menu', query: 'Main menu' }
    ];

    function wait(ms) {
        return new Promise((resolve) => {
            window.setTimeout(resolve, ms);
        });
    }

    function scrollMessagesToBottom() {
        messages.scrollTop = messages.scrollHeight;
    }

    function setInputBusy(isBusy) {
        input.disabled = isBusy;
        if (sendBtn) sendBtn.disabled = isBusy;
        if (attachBtn) attachBtn.disabled = isBusy;
    }

    function addMessage(text, role) {
        const bubble = document.createElement('div');
        bubble.className = `gnps-chat-bubble ${role === 'user' ? 'user' : 'bot'}`;
        bubble.textContent = text;
        messages.appendChild(bubble);
        scrollMessagesToBottom();
    }

    function createContactActionsNode() {
        const actions = document.createElement('div');
        actions.className = 'gnps-chat-actions';

        const contactBtn = document.createElement('a');
        contactBtn.className = 'gnps-chat-contact-btn';
        contactBtn.href = 'contact.php';
        contactBtn.textContent = 'Open Contact Support';

        actions.appendChild(contactBtn);
        return actions;
    }

    function typingSpeedForChar(char) {
        if (/[,.;:!?]/.test(char)) return 22;
        if (/\s/.test(char)) return 10;
        return window.innerWidth <= 480 ? 11 : 13;
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

    async function waitForTypingIdle() {
        while (state.isTypingMessage) {
            await wait(40);
        }
    }

    async function writeBotBubbleText(bubble, text) {
        for (const char of text) {
            bubble.textContent += char;
            scrollMessagesToBottom();
            await wait(typingSpeedForChar(char));
        }
    }

    async function sendBotMessage(text, options = {}, delayMs = BOT_REPLY_DELAY_MS) {
        await waitForTypingIdle();
        state.isTypingMessage = true;
        setInputBusy(true);

        showTyping();
        await wait(delayMs);
        hideTyping();

        const bubble = document.createElement('div');
        bubble.className = 'gnps-chat-bubble bot';
        bubble.textContent = '';
        messages.appendChild(bubble);
        scrollMessagesToBottom();

        await writeBotBubbleText(bubble, text);

        if (options.contactButton) {
            bubble.appendChild(createContactActionsNode());
        }

        state.isTypingMessage = false;
        setInputBusy(false);
        scrollMessagesToBottom();
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

    function resetAdmissionGuide() {
        state.selectedCourse = '';
        state.admissionGuideActive = false;
        state.admissionStepIndex = 0;
    }

    function resetToMainMenu() {
        state.activePath = 'main';
        resetAdmissionGuide();
    }

    function courseKeyFromQuery(query) {
        const q = query.toLowerCase();

        if (q.includes('a.n.m') || q.includes('anm') || q.includes('auxiliary nurse')) {
            return 'anm';
        }
        if (q.includes('g.n.m') || q.includes('gnm') || q.includes('general nursing')) {
            return 'gnm';
        }
        if (q.includes('b.sc') || q.includes('bsc') || q.includes('b sc') || q.includes('bachelor of science in nursing')) {
            return 'bsc';
        }

        return '';
    }

    function menuOverviewText() {
        return [
            'Main menu options:',
            '1. Admission Process',
            '2. Course Menu',
            '3. Documents Required',
            '4. Fees Details',
            '5. Campus Facilities',
            '6. Scholarship',
            '7. Contact Support'
        ].join('\n');
    }

    function courseDetailsText(courseKey) {
        const course = courseCatalog[courseKey];
        if (!course) return 'Course details are currently unavailable.';

        const lines = [
            `${course.title}`,
            `${course.summary}`,
            `Full Name: ${course.fullName}`,
            `Level: ${course.level}`,
            `Course Duration: ${course.duration}`,
            `Eligibility: ${course.eligibility}`
        ];

        if (course.admissionBasis) {
            lines.push(`Admission Basis: ${course.admissionBasis}`);
        }

        lines.push('Next: Start admission path for this course or return to Main Menu.');
        return lines.join('\n');
    }

    function courseDetailsSuggestions(courseKey) {
        const course = courseCatalog[courseKey];
        if (!course) return courseMenuSuggestions;

        return [
            { label: 'Start Admission', query: `Start ${course.title} admission` },
            { label: 'Check Eligibility', query: `${course.title} eligibility` },
            { label: 'Contact Support', query: 'Contact support' },
            { label: 'Main Menu', query: 'Main menu' }
        ];
    }

    function compareCoursesText() {
        return [
            'Course comparison:',
            'A.N.M: 2 years, entry-level foundation, community health focus.',
            'G.N.M: 3 years, stronger clinical exposure, diploma pathway.',
            'B.Sc Nursing: 4 years, advanced undergraduate level with Biology requirement.',
            'Next: Select one course detail to continue.'
        ].join('\n');
    }

    function admissionDocsText() {
        const selectedLabel = state.selectedCourse && courseCatalog[state.selectedCourse]
            ? courseCatalog[state.selectedCourse].title
            : 'selected course';

        return [
            `Documents for ${selectedLabel}:`,
            '- 10+2 marksheet and certificate',
            '- Valid ID proof',
            '- Passport size photos',
            '- Transfer or migration certificate (if applicable)',
            'Next: Use Contact Support for exact latest document checklist.'
        ].join('\n');
    }

    function contactInfoText() {
        return [
            'Support details:',
            'Sandalpur (Bazar Samiti), Mahendru, Bahadurpur, Patna - 800006',
            'Email: gurudeocollegeofnursing@gmail.com',
            'Next: Use the Contact Support button for direct help.'
        ].join('\n');
    }

    function startAdmissionForCourse(courseKey) {
        const steps = admissionFlowByCourse[courseKey] || [];
        const course = courseCatalog[courseKey];

        if (!course || steps.length === 0) {
            return {
                reply: 'Admission path is unavailable right now. Please use Contact Support.',
                suggestions: [
                    { label: 'Contact Support', query: 'Contact support' },
                    { label: 'Main Menu', query: 'Main menu' }
                ],
                needsContact: true,
                intent: 'admission-path-error'
            };
        }

        state.activePath = 'admission';
        state.selectedCourse = courseKey;
        state.admissionGuideActive = true;
        state.admissionStepIndex = 1;

        const firstStep = steps[0];
        const nextStep = steps[1];
        const nextLine = nextStep
            ? `Next: ${nextStep.title}. Tap Next Step.`
            : 'Next: Use Contact Support for final admission confirmation.';

        return {
            reply: `You selected ${course.title} admission path.\n${firstStep.title}: ${firstStep.text}\n${nextLine}`,
            suggestions: nextStep
                ? [
                    { label: 'Next Step', query: 'Next step' },
                    { label: 'Course Details', query: `${course.title} details` },
                    { label: 'Documents Required', query: 'Documents required' },
                    { label: 'Main Menu', query: 'Main menu' }
                ]
                : [
                    { label: 'Contact Support', query: 'Contact support' },
                    { label: 'Main Menu', query: 'Main menu' }
                ],
            needsContact: !nextStep,
            intent: 'admission-path-start'
        };
    }

    function nextAdmissionStepResponse() {
        if (!state.admissionGuideActive || !state.selectedCourse) {
            return {
                reply: 'Please choose Admission Process first, then select your course path.',
                suggestions: admissionMenuSuggestions,
                needsContact: false,
                intent: 'admission-next-missing'
            };
        }

        const courseKey = state.selectedCourse;
        const course = courseCatalog[courseKey];
        const steps = admissionFlowByCourse[courseKey] || [];

        if (state.admissionStepIndex >= steps.length) {
            state.admissionGuideActive = false;
            return {
                reply: `${course.title} path final stage reached. Next: Use Contact Support for seat availability, timeline, and final confirmation.`,
                suggestions: [
                    { label: 'Contact Support', query: 'Contact support' },
                    { label: 'Main Menu', query: 'Main menu' }
                ],
                needsContact: true,
                intent: 'admission-final'
            };
        }

        const currentStep = steps[state.admissionStepIndex];
        const followingStep = steps[state.admissionStepIndex + 1];
        state.admissionStepIndex += 1;

        if (followingStep) {
            return {
                reply: `${course.title} path:\n${currentStep.title}: ${currentStep.text}\nNext: ${followingStep.title}. Tap Next Step.`,
                suggestions: [
                    { label: 'Next Step', query: 'Next step' },
                    { label: 'Documents Required', query: 'Documents required' },
                    { label: 'Contact Support', query: 'Contact support' },
                    { label: 'Main Menu', query: 'Main menu' }
                ],
                needsContact: false,
                intent: 'admission-progress'
            };
        }

        state.admissionGuideActive = false;
        return {
            reply: `${course.title} path:\n${currentStep.title}: ${currentStep.text}\nNext: Use Contact Support to complete final counseling and confirmation.`,
            suggestions: [
                { label: 'Contact Support', query: 'Contact support' },
                { label: 'Main Menu', query: 'Main menu' }
            ],
            needsContact: true,
            intent: 'admission-complete'
        };
    }

    function localOfflineResponse(query) {
        const q = query.toLowerCase().trim();

        if (q === 'hi' || q === 'hello' || q === 'menu' || q.includes('main menu')) {
            resetToMainMenu();
            return {
                reply: menuOverviewText(),
                suggestions: mainMenuSuggestions,
                needsContact: false,
                intent: 'menu'
            };
        }

        if (q.includes('contact support') || q === 'contact' || q.includes('call') || q.includes('email') || q.includes('address') || q.includes('location')) {
            return {
                reply: contactInfoText(),
                suggestions: [
                    { label: 'Main Menu', query: 'Main menu' },
                    { label: 'Admission Process', query: 'Admission process' }
                ],
                needsContact: true,
                intent: 'contact'
            };
        }

        if (q.includes('admission process') || q === 'admission' || q === 'apply') {
            state.activePath = 'admission';
            resetAdmissionGuide();
            return {
                reply: 'You selected Admission Process. Next menu: choose one course path.',
                suggestions: admissionMenuSuggestions,
                needsContact: false,
                intent: 'admission-menu'
            };
        }

        if (q.includes('course menu') || q.includes('courses offered') || q.includes('course option') || q.includes('course details')) {
            state.activePath = 'courses';
            resetAdmissionGuide();
            return {
                reply: 'You selected Course Menu. Next menu: choose one course for detailed information.',
                suggestions: courseMenuSuggestions,
                needsContact: false,
                intent: 'course-menu'
            };
        }

        if (q.includes('next step')) {
            return nextAdmissionStepResponse();
        }

        if (q.includes('compare courses')) {
            state.activePath = 'courses';
            return {
                reply: compareCoursesText(),
                suggestions: courseMenuSuggestions,
                needsContact: false,
                intent: 'compare-courses'
            };
        }

        const selectedCourseKey = courseKeyFromQuery(q);
        if (selectedCourseKey) {
            const wantsAdmissionPath = q.includes('admission path') || q.includes('start') && q.includes('admission');
            const wantsEligibilityOnly = q.includes('eligibility');

            if (wantsEligibilityOnly) {
                const course = courseCatalog[selectedCourseKey];
                return {
                    reply: `${course.title} eligibility: ${course.eligibility}\nNext: Start admission path or use Contact Support for exact criteria updates.`,
                    suggestions: courseDetailsSuggestions(selectedCourseKey),
                    needsContact: false,
                    intent: 'eligibility'
                };
            }

            if (wantsAdmissionPath || state.activePath === 'admission' && !q.includes('details')) {
                return startAdmissionForCourse(selectedCourseKey);
            }

            state.activePath = 'courses';
            return {
                reply: courseDetailsText(selectedCourseKey),
                suggestions: courseDetailsSuggestions(selectedCourseKey),
                needsContact: false,
                intent: `${selectedCourseKey}-details`
            };
        }

        if (q.includes('document') || q.includes('certificate') || q.includes('marksheet') || q.includes('id proof')) {
            return {
                reply: admissionDocsText(),
                suggestions: [
                    { label: 'Admission Process', query: 'Admission process' },
                    { label: 'Contact Support', query: 'Contact support' },
                    { label: 'Main Menu', query: 'Main menu' }
                ],
                needsContact: true,
                intent: 'documents'
            };
        }

        if (q.includes('fees') || q.includes('fee') || q.includes('payment')) {
            const courseLabel = state.selectedCourse && courseCatalog[state.selectedCourse]
                ? courseCatalog[state.selectedCourse].title
                : 'your selected course';

            return {
                reply: `Fee structure may vary by session and category for ${courseLabel}. Next: use Contact Support for exact latest fee details.`,
                suggestions: [
                    { label: 'Contact Support', query: 'Contact support' },
                    { label: 'Admission Process', query: 'Admission process' },
                    { label: 'Main Menu', query: 'Main menu' }
                ],
                needsContact: true,
                intent: 'fees'
            };
        }

        if (q.includes('facility') || q.includes('facilities') || q.includes('campus') || q.includes('lab') || q.includes('library') || q.includes('hostel')) {
            return {
                reply: 'Campus support includes practical labs, student-focused learning support, and discipline-oriented guidance.',
                suggestions: [
                    { label: 'Course Menu', query: 'Course menu' },
                    { label: 'Admission Process', query: 'Admission process' },
                    { label: 'Main Menu', query: 'Main menu' }
                ],
                needsContact: false,
                intent: 'facilities'
            };
        }

        if (q.includes('scholarship') || q.includes('financial aid')) {
            return {
                reply: 'Scholarship support is eligibility-based and may change each cycle. Next: connect with Contact Support for latest rules.',
                suggestions: [
                    { label: 'Contact Support', query: 'Contact support' },
                    { label: 'Main Menu', query: 'Main menu' }
                ],
                needsContact: true,
                intent: 'scholarship'
            };
        }

        if (q.includes('exam') || q.includes('result')) {
            return {
                reply: 'Exam and result updates are shared on dedicated pages. Next: use Contact Support for personal status queries.',
                suggestions: [
                    { label: 'Contact Support', query: 'Contact support' },
                    { label: 'Main Menu', query: 'Main menu' }
                ],
                needsContact: false,
                intent: 'exam'
            };
        }

        return {
            reply: 'Please choose from menu options. I can guide admission steps and course details clearly.',
            suggestions: mainMenuSuggestions,
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
        const localFirst = localOfflineResponse(query);
        if (localFirst.intent !== 'fallback') {
            return localFirst;
        }

        if (state.offlineMode) {
            return localFirst;
        }

        try {
            const backend = await requestBackendResponse(query);
            if (backend && typeof backend.reply === 'string' && backend.reply.trim() !== '') {
                const backendIntent = String(backend.intent || '').toLowerCase();

                if (backendIntent === 'admission') {
                    state.activePath = 'admission';
                    resetAdmissionGuide();
                    return {
                        reply: 'You selected Admission Process. Next menu: choose one course path.',
                        suggestions: admissionMenuSuggestions,
                        needsContact: false,
                        intent: 'admission-menu'
                    };
                }

                if (backendIntent === 'courses') {
                    state.activePath = 'courses';
                    return {
                        reply: 'You selected Course Menu. Next menu: choose one course for detailed information.',
                        suggestions: courseMenuSuggestions,
                        needsContact: false,
                        intent: 'course-menu'
                    };
                }

                const suggestions = Array.isArray(backend.suggestions) && backend.suggestions.length
                    ? backend.suggestions.map((item) => ({
                        label: item.label || item.query || 'Suggestion',
                        query: item.query || item.label || 'Main menu'
                    }))
                    : mainMenuSuggestions;

                return {
                    reply: backend.reply,
                    suggestions,
                    needsContact: Boolean(backend.needsContact),
                    intent: backendIntent || 'fallback'
                };
            }
        } catch (error) {
            // Backend may be unavailable; keep local flow active.
        }

        return localFirst;
    }

    async function playWelcomeSequence() {
        if (!widget.classList.contains('is-open')) {
            return;
        }

        await sendBotMessage('Hello, I am your GNPS Assistant.\nI help students with courses, admission, and documents.\nChoose a menu option to get started.');
        renderSuggestions(mainMenuSuggestions);
    }

    function openChat() {
        widget.classList.add('is-open');
        launcher.setAttribute('aria-expanded', 'true');
        panel.removeAttribute('inert');
        panel.setAttribute('aria-hidden', 'false');

        if (!state.initialized) {
            state.initialized = true;
            playWelcomeSequence();
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

    async function handleQuery(rawQuery) {
        const query = (rawQuery || '').trim();
        if (!query) return;

        await waitForTypingIdle();
        setInputBusy(true);
        addMessage(query, 'user');

        try {
            const assistant = await getAssistantResponse(query);
            await sendBotMessage(assistant.reply, { contactButton: assistant.needsContact });

            if (assistant.intent === 'fallback') {
                state.fallbackCount += 1;
            } else {
                state.fallbackCount = 0;
            }

            if (state.fallbackCount >= 2) {
                await sendBotMessage('I may not have the exact answer. Please use Contact Support for accurate help.', { contactButton: true });
                renderSuggestions([
                    { label: 'Contact Support', query: 'Contact support' },
                    { label: 'Main Menu', query: 'Main menu' }
                ]);
                state.fallbackCount = 0;
                return;
            }

            renderSuggestions(assistant.suggestions && assistant.suggestions.length ? assistant.suggestions : mainMenuSuggestions);
        } catch (error) {
            await sendBotMessage('Something went wrong while processing your request. Please try again.');
            renderSuggestions(mainMenuSuggestions);
        } finally {
            if (!state.isTypingMessage) {
                setInputBusy(false);
            }
        }
    }

    launcher.addEventListener('click', () => {
        if (widget.classList.contains('is-open')) {
            closeChat();
        } else {
            openChat();
        }
    });

    closeBtn.addEventListener('click', () => closeChat());

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        const query = input.value;
        input.value = '';
        handleQuery(query);
    });

    if (attachBtn) {
        attachBtn.addEventListener('click', async () => {
            await sendBotMessage('Attachment upload will be added soon. For document support, please use Contact Support.', { contactButton: true });
            renderSuggestions([
                { label: 'Documents Required', query: 'Documents required' },
                { label: 'Contact Support', query: 'Contact support' },
                { label: 'Main Menu', query: 'Main menu' }
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
        sendBotMessage('Connection is offline. I will continue with local guidance mode.');
        renderSuggestions(mainMenuSuggestions);
    });

    window.addEventListener('scroll', updateVisibilityByScroll, { passive: true });
    window.addEventListener('resize', updateVisibilityByScroll);
    window.addEventListener('orientationchange', updateVisibilityByScroll);
    window.addEventListener('pageshow', updateVisibilityByScroll);

    updateVisibilityByScroll();
});
