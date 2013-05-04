function readBlob(opt_startByte, opt_stopByte) {

	var files = document.getElementById('file_path').files;
	if (!files.length) {
		alert('Please select a file!');
		return;
	}

	var file = files[0];
	var start = parseInt(opt_startByte) || 0;
	var stop = parseInt(opt_stopByte) || file.size - 1;

	var reader = new FileReader();

	// If we use onloadend, we need to check the readyState.
	reader.onloadend = function(evt) {
		if (evt.target.readyState == FileReader.DONE) { // DONE == 2
			document.getElementById('byte_content').textContent = evt.target.result;
			document.getElementById('byte_range').textContent = [
					'Read bytes: ', start + 1, ' - ', stop + 1, ' of ',
					file.size, ' byte file' ].join('');
		}
	};

	var blob = file.slice(start, stop + 1);
	reader.readAsBinaryString(blob);
}