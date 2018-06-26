function changeBib(numB) {
    for (let i = 1; i <= numB; i++) {
        var img = document.getElementById(`bib${i}`);
        img.src="../img/iconBiberon.png";
    }
    var note = document.getElementById('note');
    note.value = numB.toString();
}