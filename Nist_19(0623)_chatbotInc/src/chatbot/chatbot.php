
    <!-- Chatbot Button -->
    <button id="chatbot-button" class="fixed bottom-6 left-6 z-50 opacity-0 transition-opacity duration-500 bg-blue-600 hover:bg-blue-700 text-white rounded-full p-4 shadow-lg transition-all duration-300 transform hover:scale-110 focus:outline-none focus:ring-4 focus:ring-blue-300">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
        </svg>
    </button>

    <!-- Chatbot Window -->
    <div id="chatbot-window" class="fixed bottom-24 left-6 w-80 bg-white rounded-lg shadow-2xl z-50 transform translate-y-full opacity-0 transition-all duration-300 overflow-hidden" style="visibility: hidden;">
        <!-- Header -->
        <div class="bg-blue-600 text-white p-4 flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                    <!-- <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg> -->
                    <img src="images/logo.jpg" alt="NIST Logo" class="w-8 h-8 rounded-full">
                </div>
                <div>
                    <div class="font-semibold">NIST19 Assistant</div>
                    <div class="text-xs opacity-90">Bot</div>
                </div>
            </div>
            <button id="close-chat" class="text-white hover:text-gray-200 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Messages Container -->
        <div id="messages-container" class="h-80 overflow-y-auto p-4 space-y-4">
            <!-- Welcome Message -->
            <div class="flex items-start space-x-2">
                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <!-- <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg> -->
                    <img src="images/logo.jpg" alt="NIST Logo" class="w-8 h-8 rounded-full">
                </div>
                <div class="bg-gray-100 rounded-lg p-3 max-w-64">
                    <p class="text-sm text-gray-800">Hello! I'm your NIST19 assistant. How can I help you today?</p>
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="border-t p-4">
            <div class="flex space-x-2">
                <input 
                    type="text" 
                    id="user-input" 
                    placeholder="Type your message..." 
                    class="flex-1 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
                <button 
                    id="send-button" 
                    class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg px-4 py-2 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
