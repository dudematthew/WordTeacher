let getFileNameFromPath = (str) => /([^\\]+)$/.exec(str)[1];

let checkFileUpload = (input) => {
    let fileUploadInnerText = document.getElementById("file_upload_inner_text");
    fileUploadInnerText.innerText = getFileNameFromPath(input.value);
}