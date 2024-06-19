import Dropzone from 'dropzone';
Dropzone.autoDiscover = false;

new Dropzone('#image-upload', {
    paramName: 'image', // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    dictRemoveFile: 'Remove file',
    url: '/upload', // Set the url for the upload endpoint
    method: 'post'
  });