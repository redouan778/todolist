function isInputNumber(evt){
    var ch = String.fromCharCode(evt.which);
    if(!(/[0-9999/.,.,./]/.test(ch))){
        evt.preventDefault();
    }
}
