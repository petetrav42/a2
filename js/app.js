function displaySplitBill() {
    if (document.getElementById('splitBill').value == 'yes') {
        document.getElementById('split').style.display = 'block';
    } else {
        document.getElementById('split').style.display = 'none';
    }
}