<!-- Chatbot Floating Icon -->
<button id="chatbot-button" onclick="toggleChatbot()" title="Chat with us">
    💬
</button>

<!-- Chatbot Container -->
<div id="chatbot-container">
    <div class="chat-header">
        <button id="back-button" onclick="toggleChatbot()" title="Close Chatbot">
            <i class="fas fa-arrow-left"></i> <!-- Font Awesome back arrow icon -->
        </button>
        Welcome to Bharath Darsika Chatbot
    </div>
    <div id="chat-box">
        <div class="message bot">
            <div class="text">Hello! Welcome to Bharath Darsika. How can I assist you in planning your journey across India?</div>
        </div>
    </div>
    <div class="input-area">
        <div class="upload-container">
            <label for="file-upload" class="upload-btn" title="Upload Image">
                <i class="fas fa-image"></i>
            </label>
            <input type="file" id="file-upload" accept="image/*" style="display:none;">
        </div>
        <input type="text" id="user-input" placeholder="Type your message...">
        <button id="send-btn">SEND<i class="fas fa-paper-plane"></i></button>
    </div>
    <div id="preview-container" style="display:none;">
        <div class="image-preview">
            <img id="preview-image" src="#" alt="Preview">
            <button id="remove-image" title="Remove Image"><i class="fas fa-times"></i></button>
        </div>
    </div>
</div>

<!-- Overlay -->
<div id="overlay"></div>

<!-- Chatbot Styles -->
<style>
    /* Chatbot Container */
    #chatbot-container {
        width: 400px;
        height: 600px;
        display: flex;
        flex-direction: column;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: none; /* Initially hidden */
        z-index: 1000; /* Ensure it's above other content */
    }

    #chatbot-container .chat-header {
        padding: 15px;
        background: #007bff;
        color: #fff;
        text-align: center;
        font-size: 1.5em;
        position: relative; /* For positioning the back button */
    }

    /* Back Button */
    #back-button {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #fff;
        font-size: 1.2em;
        cursor: pointer;
    }

    #back-button:hover {
        color: #ffebcc; /* Light yellow on hover */
    }

    #chatbot-container #chat-box {
        flex: 1;
        padding: 20px;
        overflow-y: auto;
        background: #f0f9ff;
    }

    #chatbot-container .message {
        margin-bottom: 15px;
        display: flex;
    }

    #chatbot-container .message.user {
        justify-content: flex-end;
    }

    #chatbot-container .message.bot {
        justify-content: flex-start;
    }

    #chatbot-container .message .text {
        max-width: 70%;
        padding: 10px 15px;
        border-radius: 15px;
        font-size: 14px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    #chatbot-container .message.user .text {
        background: #007bff;
        color: #fff;
    }

    #chatbot-container .message.bot .text {
        background: #ffebcc;
        color: #333;
    }

    #chatbot-container .input-area {
        display: flex;
        padding: 10px;
        border-top: 2px solid #007bff;
        align-items: center;
    }

    #chatbot-container #user-input {
        flex: 1;
        padding: 10px;
        border: 2px solid #007bff;
        border-radius: 10px;
        font-size: 14px;
        outline: none;
        margin: 0 10px;
    }

    #chatbot-container #send-btn {
        padding: 10px;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        color: #fff;
        background: #000;
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #chatbot-container #send-btn:hover {
        background: #333;
    }

    /* Upload Button Styles */
    .upload-container {
        display: flex;
        align-items: center;
    }

    .upload-btn {
        background: #007bff;
        color: white;
        padding: 10px;
        border-radius: 50%;
        cursor: pointer;
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: background 0.3s;
    }

    .upload-btn:hover {
        background: #0056b3;
    }

    /* Image Preview Styles */
    #preview-container {
        padding: 10px;
        border-top: 1px solid #ddd;
        background: #f9f9f9;
    }

    .image-preview {
        position: relative;
        display: inline-block;
    }

    #preview-image {
        max-width: 100%;
        max-height: 150px;
        border-radius: 5px;
    }

    #remove-image {
        position: absolute;
        top: -10px;
        right: -10px;
        background: #ff4444;
        color: white;
        border: none;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Stylish Floating Chatbot Button */
    #chatbot-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: linear-gradient(135deg, #007bff, #6610f2);
        color: #fff;
        border: none;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        font-size: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        z-index: 1000; /* Ensure it's above other content */
    }

    #chatbot-button:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
    }

    #chatbot-button:active {
        transform: scale(0.95);
    }

    /* Overlay when chatbot is open */
    #overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999; /* Below chatbot but above other content */
        display: none; /* Initially hidden */
    }
</style>

<!-- Chatbot Script -->
<script>
    // Toggle chatbot visibility
    function toggleChatbot() {
        const chatbotContainer = document.getElementById('chatbot-container');
        const overlay = document.getElementById('overlay');

        if (chatbotContainer.style.display === 'none' || chatbotContainer.style.display === '') {
            chatbotContainer.style.display = 'flex';
            overlay.style.display = 'block';
        } else {
            chatbotContainer.style.display = 'none';
            overlay.style.display = 'none';
        }
    }

    // Image upload functionality
    document.getElementById('file-upload').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const previewImage = document.getElementById('preview-image');
                previewImage.src = event.target.result;
                document.getElementById('preview-container').style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });

    // Remove image functionality
    document.getElementById('remove-image').addEventListener('click', function() {
        document.getElementById('file-upload').value = '';
        document.getElementById('preview-container').style.display = 'none';
    });

    // Send message functionality
    document.getElementById('send-btn').addEventListener('click', async () => {
        const userInput = document.getElementById('user-input').value;
        const fileInput = document.getElementById('file-upload');
        
        // Don't send if there's no input and no image
        if (!userInput && !fileInput.files[0]) return;

        // Display user message if text exists
        const chatBox = document.getElementById('chat-box');
        if (userInput) {
            const userMessage = document.createElement('div');
            userMessage.classList.add('message', 'user');
            userMessage.innerHTML = `<div class="text">${userInput}</div>`;
            chatBox.appendChild(userMessage);
        }

        // Display image if uploaded
        if (fileInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const imageMessage = document.createElement('div');
                imageMessage.classList.add('message', 'user');
                imageMessage.innerHTML = `
                    <div class="text">
                        <img src="${event.target.result}" style="max-width: 100%; border-radius: 8px;" alt="Uploaded Image">
                    </div>
                `;
                chatBox.appendChild(imageMessage);
                
                // Clear the preview and file input
                document.getElementById('preview-container').style.display = 'none';
                fileInput.value = '';
                
                // Scroll to bottom after image loads
                setTimeout(() => {
                    chatBox.scrollTop = chatBox.scrollHeight;
                }, 100);
            };
            reader.readAsDataURL(fileInput.files[0]);
        }

        // Clear text input
        document.getElementById('user-input').value = '';

        // Scroll to bottom
        chatBox.scrollTop = chatBox.scrollHeight;

        // Call your chatbot API (e.g., OpenAI)
        // Note: For image processing, you'll need to use a model that supports images (like GPT-4 Vision)
        // This is just a basic text implementation
        if (userInput) {
            const response = await fetch('https://api.openai.com/v1/chat/completions', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer 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` // Replace with your OpenAI API key
                },
                body: JSON.stringify({
                    model: "gpt-3.5-turbo",
                    messages: [{ role: "user", content: userInput }]
                })
            });

            const data = await response.json();
            const botReply = data.choices[0].message.content;

            // Display bot reply
            const botMessage = document.createElement('div');
            botMessage.classList.add('message', 'bot');
            botMessage.innerHTML = `<div class="text">${botReply}</div>`;
            chatBox.appendChild(botMessage);

            // Scroll to bottom
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    });

    // Allow sending message with Enter key
    document.getElementById('user-input').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            document.getElementById('send-btn').click();
        }
    });
</script>