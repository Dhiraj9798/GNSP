<section class="gnps-chat-widget" id="gnpsChatWidget" aria-label="Nursing College AI Assistant">
    <button class="gnps-chat-launcher" id="gnpsChatLauncher" type="button" aria-expanded="false" aria-controls="gnpsChatPanel" aria-label="Open chat assistant">
        <img src="assets/images/chartbot.png" alt="Counselor Avatar">
    </button>

    <article class="gnps-chat-panel" id="gnpsChatPanel" aria-hidden="true">
        <header class="gnps-chat-header">
            <div class="gnps-chat-agent">
                <img src="assets/images/chartbot.png" alt="Counselor Avatar">
                <div class="gnps-chat-agent-meta">
                    <h3>Nursing College Assistant</h3>
                    <p>Online Counselor</p>
                </div>
            </div>
            <button class="gnps-chat-close" id="gnpsChatClose" type="button" aria-label="Close chat">&times;</button>
        </header>

        <div class="gnps-chat-messages" id="gnpsChatMessages" aria-live="polite" aria-label="Chat messages"></div>

        <div class="gnps-chat-suggestions" id="gnpsChatSuggestions" aria-label="Quick suggestions"></div>

        <form class="gnps-chat-input-wrap" id="gnpsChatForm">
            <button type="button" class="gnps-chat-attach" id="gnpsChatAttach" aria-label="Attachment">
                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                    <path d="M16.5 6.5v10a4.5 4.5 0 1 1-9 0v-11a3 3 0 1 1 6 0v9.5a1.5 1.5 0 1 1-3 0V7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            <input id="gnpsChatInput" type="text" placeholder="Ask about courses, admission..." autocomplete="off" required>
            <button type="submit" class="gnps-chat-send" aria-label="Send message">
                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                    <path d="M3 11.5 20.5 3l-4.8 18-3.6-6.4L3 11.5Z" fill="currentColor" />
                </svg>
            </button>
        </form>
    </article>
</section>
