<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floating Chatbot Logo</title>
    <link rel="stylesheet" href="styles.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="fontawsome/css/all.min.css">
    <style>
        .chatbotcontainer {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #fff;

        }

        .chatbot-logo {
            position: fixed;
            /* Ensures the logo stays fixed in the viewport */
            bottom: 20px;
            /* Adjust as needed to position the logo vertically */
            right: 20px;
            /* Adjust as needed to position the logo horizontally */
            width: 60px;
            /* Adjust the size of the logo */
            height: 60px;
            /* background-color: #007bff; Example background color */
            background-color: #fff;
            border-radius: 50%;
            /* Ensures the logo appears as a circle */
            box-shadow: 0 4px 8px rgba(1, 1, 1, 1);
            /* Optional: Adds shadow for depth */
            z-index: 1000;
            /* Ensures the logo is above other content */
            cursor: pointer;
            /* Optional: Changes cursor to pointer on hover */
        }



        .chatbot-logo img {
            width: auto;
            /* Ensures the logo image fits within the circle */
            height: 59px;
            display: block;
            padding: 0px;
            /* Optional: Adds padding inside the circle */
            border-radius: 5px;
        }

        .user-input {
            padding: 5px;
            /* position: absolute; */
            bottom: 0px;
        }

        .chats {
            position: fixed;
            bottom: 80px;
            /* Adjust to leave space for the input */
            right: 75px;
            width: 300px;
            height: 480px;
            /* Adjust for input and logo height */
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(1, 1, 1, 1);
            z-index: 1000;
            display: none;
            overflow-y: auto;

        }

        .messages {
            padding: 10px;
            overflow-y: auto;
            height: calc(100% - 60px);
            /* Adjust padding and input height */
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
        }

        .user-input {
            display: flex;
            align-items: center;
            padding: 10px;
            width: calc(100% - 20px);
            position: absolute;
            bottom: 0;
            background-color: #fff;
        }

        .user-input input[type="text"] {
            flex: 1;
            height: 40px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 0 10px;
        }

        .user-input button {
            height: 40px;
            width: 70px;
            padding: 0;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .message {
            background-color: #e5e5ea;
            border-radius: 10px;
            padding: 8px;
            margin-bottom: 8px;
            max-width: fit-content;
            word-wrap: break-word;


        }

        .message-bot {
            background-color: #f0f0f0;
            /* text-align: start; */
            align-self: flex-start;
        }

        .message-user {
            background-color: #007bff;
            color: white;
            /* text-align: end; */
            align-self: flex-end;
        }
    </style>
</head>

<body>
    <div class="chatbotcontainer" style="overflow-y: auto ; max-height:10vh; max-width:40px;">
        <div class="chats" id="chats" style="overflow-y: auto ;">
            <div class="messages" id="messages">
                <!-- Chat messages will be dynamically added here -->
            </div>
            <div class="user-input input-group">
                <form id="myForm" class="input-group">


                    <input type="text" class="form-control" id="userInput" placeholder="Type your message..." style="width: 200px;">

                    <button class="btn btn-primary" style="width: 50px; padding:0px;" onclick="sendMessage()">Send</button>



                </form>
            </div>
        </div>
        <div class="chatbot-logo">
            <!-- <img src="images/chatbot1.png" alt="Chatbot Icon"> -->
            <img src="images/chatbotgifcrop.gif" alt="Chatbot Icon" id="logo">
            <!-- <i class="fa-solid fa-comment"></i> -->
        </div>
    </div>
    <!-- <script src="js/bootstrap.bundle.js"></script> -->
    <script>
        const myForm = document.getElementById('myForm');

        // Add event listener for submit event
        myForm.addEventListener('submit', function(event) {
            // Prevent the default form submission
            event.preventDefault();

        });

        const logo = document.getElementById('logo');
        const chats = document.getElementById('chats');
        const messages = document.getElementById('messages');
        const userInput = document.getElementById('userInput');

        logo.addEventListener('click', function() {
            // Toggle visibility of myDiv
            if (chats.style.display === 'block') {
                chats.style.display = 'none';
            } else {
                chats.style.display = 'block';
            }
        });



        // Simulate bot response (you can replace this with actual bot integration)
        setTimeout(function() {
            const defaultMsg1 = "Hi! Welcome to EMS chat support. I am your virtual support guide. Don't share sensitive info. Chats may be reviewed and used to train our models. Learn more"

            addMessage(defaultMsg1, 'bot');

        }, 2000); // Simulating delay for bot response (0.5 seconds)
        setTimeout(function() {

            const defaultMsg2 = "If you need emergency assitance, please call us at the following number :\n+918668441847\n"


            addMessage(defaultMsg2, 'bot');

        }, 3000); // Simulating delay for bot response (0.5 seconds)
        setTimeout(function() {

            const defaultMsg3 = "Now, How can I help you today?"

            addMessage(defaultMsg3, 'bot');
        }, 4000); // Simulating delay for bot response (0.5 seconds)

        // Clear the input field after sending message
        userInput.value = '';

        // function sendMessage() {
        //     const userInputText = userInput.value.trim();

        //     if (userInputText === '') {
        //         return;
        //     }

        //     // Add user message to the UI
        //     addMessage(userInputText, 'user');

        //     // Simulate bot response (you can replace this with actual bot integration)
        //     setTimeout(function() {
        //         const botResponse = 'Hello, How can I help you.';
        //         addMessage(botResponse, 'bot');
        //     }, 500); // Simulating delay for bot response (0.5 seconds)

        //     // Clear the input field after sending message
        //     userInput.value = '';
        // }


        function sendMessage() {
            const userInputText = userInput.value.trim();

            if (userInputText === '') {
                return;
            }

            // Add user message to the UI
            addMessage(userInputText, 'user');

            // Simulate bot response (you can replace this with actual bot integration)
            setTimeout(function() {

                // let botResponse;

                // switch (userInputText.toLowerCase()) {
                //     case '':
                //         botResponse = "";
                //         break;
                //     case '':
                //         botResponse = "";
                //         break;
                //     case '':
                //         botResponse = "";
                //         break;
                //         // Add more cases for other questions here
                //     default:
                //         botResponse = "Hello, how can I help you?";
                //         break;
                // }


                let botResponse;
                const lowerText = userInputText.toLowerCase();

                switch (true) {
                    case lowerText.includes('view employee'):

                        botResponse = "For viewing your employee Details follow the following steps:\n" +
                            "1. Navigate to the 'Employee' menu.\n 2. Click on the 'View Employee' tab.\n" +
                            "3. Click on the 'View' button to view employee details.\n";
                           
                        break;

                    case lowerText.includes('add employee'):
                    case lowerText.includes('register employee'):
                    case lowerText.includes('new employee'):

                        botResponse = "For Resgistering new employee follow the following steps:\n  "
                        "1. Navigate to the 'Employee' menu.\n 2. Click on the 'Add Employee' tab.\n" +
                        "3. Fill the fomr correctly and click on the 'Submit' button.";
                        break;

                    case lowerText.includes('update employee'):
                    case lowerText.includes('edit employee'):
                    case lowerText.includes('delete employee'):
                    case lowerText.includes('remove employee'):

                        botResponse = "For updating your employee Details follow the following steps:\n" +
                            "1. Navigate to the 'Employee' menu.\n 2. Click on the 'Update Employee' tab.\n" +
                            "3. Click on the 'Edit' button to update employee and click on the 'Delete' button to delete employee.";
                        break;
                    case lowerText.includes('hello'):
                    case lowerText.includes('hii'):
                    case lowerText.includes('hey'):
                        botResponse = 'Hello, how can I help you?';
                        break;
                    case lowerText.includes('who are you'):
                        botResponse = 'I am EMS chatbot. A virtual assistant';
                        break;
                    case lowerText.includes('how are you'):
                    case lowerText.includes('how do you do'):
                        botResponse = 'I am fine, Thank you fo asking, How are you?';
                        break;
                    case lowerText.includes('good'):
                    case lowerText.includes('i am fine'):
                    case lowerText.includes('fine'):
                        botResponse = 'Great!';
                        break;
                    case lowerText.includes('goodbye'):
                    case lowerText.includes('bye'):
                        botResponse = 'Goodbye! If you have more questions in the future, feel free to ask. Take care!';
                        break;
                    case lowerText.includes('political'):
                    case lowerText.includes('politics'):
                    case lowerText.includes('election'):
                    case lowerText.includes('vote'):
                    case lowerText.includes('edu'):
                        botResponse = "I'm here to assist you about EMS. If you have any questions related to that, feel free to ask!";
                        break;
                    default:
                        // botResponse = "I'm here to assist you about EMS. If you have any questions related to that, feel free to ask!";
                        botResponse = "Sorry, I didn't understand. Could you please repeat that?";
                }



                addMessage(botResponse, 'bot');
            }, 500); // Simulating delay for bot response (0.5 seconds)

            // Clear the input field after sending message
            userInput.value = '';
        }

        function addMessage(message, sender) {
            const messageElement = document.createElement('div');
            messageElement.textContent = message;
            messageElement.classList.add('message');

            if (sender === 'bot') {
                messageElement.classList.add('message-bot');
            } else {
                messageElement.classList.add('message-user');
            }

            messages.appendChild(messageElement);

            // Automatically scroll to the bottom of messages
            messages.scrollTop = messages.scrollHeight;
        }
    </script>
</body>

</html>