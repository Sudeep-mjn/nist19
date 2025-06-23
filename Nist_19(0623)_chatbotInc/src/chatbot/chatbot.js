class NIST19Chatbot {
    constructor() {
        this.responses = {};
        this.isOpen = false;
        this.conversationHistory = [];
        this.isTyping = false;
        
        this.initializeElements();
        this.loadResponses();
        this.setupEventListeners();
        this.showChatbotButton();
    }

    initializeElements() {
        this.chatbotButton = document.getElementById('chatbot-button');
        this.chatbotWindow = document.getElementById('chatbot-window');
        this.closeButton = document.getElementById('close-chat');
        this.messagesContainer = document.getElementById('messages-container');
        this.userInput = document.getElementById('user-input');
        this.sendButton = document.getElementById('send-button');
        
        // Debug: Check if elements exist
        console.log('Chatbot elements initialized:', {
            button: !!this.chatbotButton,
            window: !!this.chatbotWindow,
            close: !!this.closeButton,
            messages: !!this.messagesContainer,
            input: !!this.userInput,
            send: !!this.sendButton
        });
    }

    async loadResponses() {
        try {
            const response = await fetch('responses.json');
            const data = await response.json();
            this.responses = data;
        } catch (error) {
            console.error('Failed to load responses:', error);
            this.responses = {
                responses: {},
                default_responses: ["I'm sorry, I'm having trouble accessing my knowledge base. Please try again later."]
            };
        }
    }

    setupEventListeners() {
        // Add click event to chatbot button with debugging
        if (this.chatbotButton) {
            this.chatbotButton.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                console.log('Chatbot button clicked!');
                this.toggleChat();
            });
        }
        
        if (this.closeButton) {
            this.closeButton.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                console.log('Close button clicked!');
                this.closeChat();
            });
        }
        
        if (this.sendButton) {
            this.sendButton.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                this.sendMessage();
            });
        }
        
        if (this.userInput) {
            this.userInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    this.sendMessage();
                }
            });
        }

        // Close chat when clicking outside
        document.addEventListener('click', (e) => {
            if (this.isOpen && !this.chatbotWindow.contains(e.target) && !this.chatbotButton.contains(e.target)) {
                this.closeChat();
            }
        });
    }

    showChatbotButton() {
        // Show chatbot button after 2 seconds
        setTimeout(() => {
            this.chatbotButton.style.opacity = '1';
        }, 2000);
    }
//if 2 second timer/load delay dont want
    //   showChatbotButton() {
    //     // Show chatbot button after 2 seconds
    //     setTimeout(() => {
    //         this.chatbotButton.style.opacity = '1';
    //     }, 2000);
    //     // Show chatbot button immediately
    //     this.chatbotButton.style.opacity = '1';
    // }


    toggleChat() {
        console.log('Toggle chat called, current state:', this.isOpen);
        if (this.isOpen) {
            this.closeChat();
        } else {
            this.openChat();
        }
    }

    openChat() {
        console.log('Opening chat');
        this.isOpen = true;
        if (this.chatbotWindow) {
            this.chatbotWindow.style.transform = 'translateY(0)';
            this.chatbotWindow.style.opacity = '1';
            this.chatbotWindow.style.visibility = 'visible';
        }
        if (this.userInput) {
            setTimeout(() => this.userInput.focus(), 100);
        }
    }

    closeChat() {
        console.log('Closing chat');
        this.isOpen = false;
        if (this.chatbotWindow) {
            this.chatbotWindow.style.transform = 'translateY(100%)';
            this.chatbotWindow.style.opacity = '0';
            setTimeout(() => {
                this.chatbotWindow.style.visibility = 'hidden';
            }, 300);
        }
    }

    async sendMessage() {
        const message = this.userInput.value.trim();
        if (!message || this.isTyping) return;

        // Add user message
        this.addMessage(message, 'user');
        this.userInput.value = '';

        // Show typing indicator
        this.showTypingIndicator();

        // Process message and get response
        const response = await this.processMessage(message);
        
        // Remove typing indicator and add bot response
        setTimeout(() => {
            this.hideTypingIndicator();
            this.addMessage(response, 'bot');
        }, 500 + Math.random() * 1000); // Realistic typing delay
    }

    addMessage(message, sender) {
        const messageDiv = document.createElement('div');
        messageDiv.className = 'flex items-start space-x-2 message-enter';

        if (sender === 'user') {
            messageDiv.innerHTML = `
                <div class="flex-1"></div>
                <div class="bg-blue-600 text-white rounded-lg p-3 max-w-64">
                    <p class="text-sm">${this.escapeHtml(message)}</p>
                </div>
                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
            `;
        } else {
            messageDiv.innerHTML = `
                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <img src="images/logo.jpg" alt="NIST Logo" class="w-8 h-8 rounded-full">
                </div>
                <div class="bg-gray-100 rounded-lg p-3 max-w-64 bot-message">
                    <p class="text-sm text-gray-800">${message}</p>
                </div>
            `;
        }

        this.messagesContainer.appendChild(messageDiv);
        this.scrollToBottom();
        
        // Store in conversation history
        this.conversationHistory.push({ message, sender, timestamp: new Date() });
    }

    showTypingIndicator() {
        this.isTyping = true;
        const typingDiv = document.createElement('div');
        typingDiv.id = 'typing-indicator';
        typingDiv.className = 'flex items-start space-x-2';
        typingDiv.innerHTML = `
            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
               <img src="images/logo.jpg" alt="NIST Logo" class="w-8 h-8 rounded-full">
            </div>
            <div class="chatbot-typing">
                <span class="text-sm text-gray-600">Typing...</span>
            </div>
        `;
        this.messagesContainer.appendChild(typingDiv);
        this.scrollToBottom();
    }

    hideTypingIndicator() {
        const typingIndicator = document.getElementById('typing-indicator');
        if (typingIndicator) {
            typingIndicator.remove();
        }
        this.isTyping = false;
    }

    async processMessage(message) {
        const cleanMessage = this.cleanMessage(message);
        
        // Find best matching response category
        let bestMatch = null;
        let bestScore = 0;

        for (const [category, data] of Object.entries(this.responses.responses)) {
            for (const keyword of data.keywords) {
                const score = this.fuzzyMatch(cleanMessage, keyword);
                if (score > bestScore && score > 0.6) { // Threshold for fuzzy matching
                    bestMatch = data;
                    bestScore = score;
                }
            }
        }

        if (bestMatch) {
            // Return random response from matched category
            const responses = bestMatch.responses;
            return responses[Math.floor(Math.random() * responses.length)];
        }

        // If no match found, return default response
        const defaultResponses = this.responses.default_responses;
        return defaultResponses[Math.floor(Math.random() * defaultResponses.length)];
    }

    cleanMessage(message) {
        return message.toLowerCase()
            .replace(/[^\w\s]/g, '') // Remove special characters
            .replace(/\s+/g, ' ') // Normalize whitespace
            .trim();
    }

    fuzzyMatch(text, keyword) {
        const textWords = text.split(' ');
        const keywordWords = keyword.split(' ');
        
        let totalScore = 0;
        let matchCount = 0;

        for (const keywordWord of keywordWords) {
            let bestWordScore = 0;
            
            for (const textWord of textWords) {
                const score = this.calculateWordSimilarity(textWord, keywordWord);
                bestWordScore = Math.max(bestWordScore, score);
            }
            
            if (bestWordScore > 0.7) {
                matchCount++;
                totalScore += bestWordScore;
            }
        }

        // Return average score of matched words
        return matchCount > 0 ? totalScore / keywordWords.length : 0;
    }

    calculateWordSimilarity(word1, word2) {
        if (word1 === word2) return 1;
        
        // Handle exact substring matches
        if (word1.includes(word2) || word2.includes(word1)) {
            return 0.9;
        }

        // Levenshtein distance calculation
        const len1 = word1.length;
        const len2 = word2.length;
        
        if (len1 === 0) return len2 === 0 ? 1 : 0;
        if (len2 === 0) return 0;

        const matrix = [];
        for (let i = 0; i <= len1; i++) {
            matrix[i] = [i];
        }
        for (let j = 0; j <= len2; j++) {
            matrix[0][j] = j;
        }

        for (let i = 1; i <= len1; i++) {
            for (let j = 1; j <= len2; j++) {
                if (word1.charAt(i - 1) === word2.charAt(j - 1)) {
                    matrix[i][j] = matrix[i - 1][j - 1];
                } else {
                    matrix[i][j] = Math.min(
                        matrix[i - 1][j - 1] + 1, // substitution
                        matrix[i][j - 1] + 1,     // insertion
                        matrix[i - 1][j] + 1      // deletion
                    );
                }
            }
        }

        const distance = matrix[len1][len2];
        const maxLength = Math.max(len1, len2);
        return 1 - distance / maxLength;
    }

    escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    scrollToBottom() {
        this.messagesContainer.scrollTop = this.messagesContainer.scrollHeight;
    }
}

// Initialize chatbot when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new NIST19Chatbot();
});
