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
  messaging.requestPermission()
  .then(function(){
  	console.log("Have Permission");
  	return messaging.getToken();
  }).then(function(token){
  	console.log("token:"+token);
  }).catch(function(err){
  	console.log("Error occured");
  });
  
  messaging.onMessage(function(payload){
  	console.log("onMessage",payload);
  });