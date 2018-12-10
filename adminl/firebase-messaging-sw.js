importScripts("https://www.gstatic.com/firebasejs/3.4.0/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/3.4.0/firebase-messaging.js");
var config = {
    apiKey: "AIzaSyDRXekEhl0yZmHlyedFHkA81iYi2dnzb_g",
    authDomain: "premiumcars-3bb17.firebaseapp.com",
    databaseURL: "https://premiumcars-3bb17.firebaseio.com",
    projectId: "premiumcars-3bb17",
    storageBucket: "",
    messagingSenderId: "728960058500"
  };
  firebase.initializeApp(config);
  
  const messaging = firebase.messaging();
  