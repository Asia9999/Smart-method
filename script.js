click_to_convert.addEventListener('click',function(){
  var speech = true;
  window.SpeechRecognition = window.webkitSpeechRecognition;
  const recognition = new SpeechRecognition();
  recognition.lang='ar';
  recognition.interimResult = true;

  recognition.addEventListener('result',e=>{
    const transcript = Array.from(e.results)
    .map(result =>result[0])
    .map(result =>result.transcript)

    convert_text.innerHTML = transcript;
  })

  if(speech == true){
    recognition.start();
  }
})