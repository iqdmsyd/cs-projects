function check_size() {
    var files = document.forms["import_form"]["files[]"];
    var files_total = files.length;
    var i, files_size = 0;
    for (i=0; i<files_total; i++) {
        files_size = files_size + files[i].size;
    }
    alert(files_size);
}
