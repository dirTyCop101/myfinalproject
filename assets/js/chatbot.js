// Show a Gen Z greeting on load


let greeted = false; // Declare 'greeted' outside of toggleChatbot to persist across toggles

function appendMessage(sender, text) {
  const msgBox = document.getElementById('chatMessages');
  const msg = document.createElement('div');

  // Style messages based on sender
  msg.className = sender === "You" ? "user-message" : "bot-message";
  msg.innerHTML = `<strong>${sender}:</strong> ${text}`;
  msgBox.appendChild(msg);
  msgBox.scrollTop = msgBox.scrollHeight;
}

function sendMessage() {
  const input = document.getElementById('userInput');
  const text = input.value.trim();
  if (!text) return;

  appendMessage("You", text);
  input.value = "";

  fetch("backend.php", {
    method: "POST",
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ message: text })
  })
  .then(res => res.json())
  .then(data => {
    appendMessage("Wrenchy", data.reply);
  })
  .catch(err => {
    appendMessage("Wrenchy", "😬 Oops! Something glitched. Try again?");
    console.error(err);
  });
}

function toggleChatbot() {
  const bot = document.getElementById("chatbotContainer");

  // Toggle the 'show' class to handle visibility with CSS
  bot.classList.toggle("show");

  // Show the greeting message only once when the chatbot is first opened
  if (!greeted && bot.classList.contains("show")) {
    appendMessage("Wrenchy", "👋 Yo! I'm Wrenchy — your go-to AI assistant for car parts 🛞. Drop your ride’s part needs and I’ll hook you up. 🚗💨");
    greeted = true; // Mark as greeted so the greeting only shows once
  }
}
