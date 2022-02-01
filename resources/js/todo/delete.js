function showConfirmBox() {
    const isConfirmed = confirm("Are you sure?");
    return isConfirmed ? true : false;
}


delete_todo.onclick = showConfirmBox;