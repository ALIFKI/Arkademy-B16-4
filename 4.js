const readline = require('readline');
const readlineInterface = readline.createInterface(process.stdin, process.stdout);

function ask(questionText) {
  return new Promise((resolve, reject) => {
    readlineInterface.question(questionText, resolve);
  });
}

start();

async function start() {
  let string = await ask('Masukan String ');
  let kata = await ask('Masukan Kata ');
  var cek = new RegExp(kata,'gi');
  if(reverseString(string).toString().match(cek) != null){
    console.log("Ditemukan "+ (reverseString(string).toString().match(cek).length + string.match(cek).length)+" kali")
  }
  else{
    console.log("Ditemukan "+string.match(cek).length+" kali")
  }
  process.exit();
}

function reverseString(str) {
  return str.split('').reverse().join('');
 }