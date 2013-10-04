var playSoundFlag=false;  // true: play
var volumeSoundFlag=false;  // true: volume up
var volumeStep=0.2;
var playVolume=1;

var mp3snd = "./Audio/audio-file.mp3";
var oggsnd = "./Audio/audio-file.ogg";

//document.write('<audio autoplay="autoplay" loop="loop" controls="controls">' );
document.write('<audio id="Musicplayer" autoplay="autoplay" loop="loop">' );
document.write('<source src="'+mp3snd+'" type="audio/mpeg">');
document.write('<source src="'+oggsnd+'" type="audio/ogg">');
document.write('<bgsound src="'+mp3snd+'" loop="INFINITE">');
document.write('</audio>');

//play Or pause music
function audioControls(){
	if (playSoundFlag)
		document.getElementById('Musicplayer').play();
	else
		document.getElementById('Musicplayer').pause();
	playSoundFlag=!(playSoundFlag);
}
//change volume level
function ChangePlayVolume(){
	var volume=document.getElementById('Musicplayer').volume;
	if ((volumeSoundFlag)&&(volume<1))
		document.getElementById('Musicplayer').volume=volume+volumeStep;
        else if (volume>=volumeStep)
		document.getElementById('Musicplayer').volume=volume-volumeStep;
}











