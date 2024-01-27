document.getElementById('imageInput').addEventListener('change', function() {
    var fileInput = this;
    var previewImage = document.getElementById('previewImage');
    
    if (fileInput.files && fileInput.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        previewImage.src = e.target.result;
      }

      reader.readAsDataURL(fileInput.files[0]);
    }
  });

  function removeProfileImage() {
    var previewImage = document.getElementById('previewImage');
    // Defina a imagem de perfil padrão ou uma URL vazia, dependendo dos requisitos
    previewImage.src = "../../assets/img/undef.png";
    
    // Limpar o campo de input de arquivo, se necessário
    document.getElementById('imageInput').value = "";
  }