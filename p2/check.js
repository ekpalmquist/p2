
function trim(str){
	return str.replace(/^\s+|\s+$/g, '');
}
function msg(id,message) {
	var node = document.getElementById(id);
		if (trim(message) == "") {
			message = String.fromCharCode(160);
		}	
	node.firstChild.nodeValue = message;
}
/*When the user clicks submit, the validAll function is called to make sure that all categories are filled.*/
function validAll(){
	var artist=validArtist(document.forms.add.artist.value);
	var song=validSong(document.forms.add.song.value);
	var album=validAlbum(document.forms.add.album.value);
	var year=validYear(document.forms.add.year.value);
	var genre=validGenre(document.forms.add.genre.value);
	
	if(!(artist && song && album && year && genre)){
			msg("submitmsg","Please correct the errors before submitting");
			return false;			
	} else return true;
}
/*When the user clicks search, the validForm function is called so make sure at least one category is being searched.*/
function validForm(){
	var artist=validArtist(document.forms.add.artist.value);
	var song=validSong(document.forms.add.song.value);
	var album=validAlbum(document.forms.add.album.value);
	var year=validYear(document.forms.add.year.value);
	var genre=validGenre(document.forms.add.genre.value);
	
	if(!(artist || song || album || year || genre)){
			msg("submitmsg","Please correct the errors before submitting");
			return false;			
	} else return true;
}
/*Each category is checked through the associated function, when the input is changed on the form, to make sure the input is valid, if not, then the entry cannot be added to the catalog.*/
function validArtist(artist) {
	var check = /^[A-Za-z0-9#&$*()! ]+$/;
	if (trim(artist) == ""){
			msg("artistmsg", "Required");
			return false;
	}
	else if (check.test(artist)) {
		msg("artistmsg","");
		return true;
	} else {
		msg("artistmsg","Please enter an artist");
		return false;
	}
}
function validSong(song) {
	var check = /^[A-Za-z0-9#&$*()! ]+$/;
	if (trim(song) == ""){
			msg("songmsg", "Required");
			return false;
	}
	else if (check.test(song)) {
		msg("songmsg","");
		return true;
	} else {
		msg("songmsg","Please enter a song");
		return false;
	}
}
function validAlbum(album) {
	var check = /^[A-Za-z0-9#&$*()! ]+$/;
	if (trim(album) == ""){
			msg("albummsg", "Required");
			return false;
	}
	else if (check.test(album)) {
		msg("albummsg","");
		return true;
	} else {
		msg("albummsg","Please enter an album");
		return false;
	}
}

function validYear(year) {
	var check = /^[0-9]{4}$/;
	if (trim(year) == ""){
			msg("yearmsg", "Required");
			return false;
	}
	else if (check.test(year)) {
		msg("yearmsg","");
		return true;
	} else {
		msg("yearmsg","Invalid 4-digit year");
		return false;
	}
}
function validGenre(genre) {
	var check = /^[A-Za-z ]+$/;
	if (trim(genre) == ""){
			msg("genremsg", "Required");
			return false;
	}
	else if (check.test(genre)) {
		msg("genremsg","");
		return true;
	} else {
		msg("genremsg","The genre must be alphabetic characters");
		return false;
	}
}
