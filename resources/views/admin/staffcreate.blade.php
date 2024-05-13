@extends('layouts.adminLayout')

@section('title', 'Dashboard | Add Staff')


@section('admin-body-navbar-title', 'Add Staff User')

@section('admin-body')
    <section class="add-staff-wrapper">
        <div class="add-staff-container">
            <form action="{{route('admin.staff.create.process')}}" method = 'POST' class="add-staff-form">
                @csrf

                <div class="row one">
                    <div class="input-field">
                        <label for="name">Name:</label>
                        <input type="text" style="width: 100% " name="name">
                    </div>

                    <div class="input-field">
                        <label for="birthday">Birthday:</label>
                        <input type="date" name="birthday" style="width: 100% ">
                    </div>
                </div>

                <div class="row two">
                    <div class="input-field">
                        <label for="name">Address:</label>
                        <input type="text" style="width: 100% " name="address">
                    </div>
                </div>

                <div class="row three">
                    <div class="input-field">
                        <label for="name">Phone:</label>
                        <input type="text" style="width: 100% " name="phone">
                    </div>

                    <div class="input-field">
                        <label for="email">Email:</label>
                        <input type="email" name="email" style="width: 100% ">
                    </div>
                </div>

                <div class="row four">
                    <div class="input-field" >
                         <div class="staffimg-drop-box" id="dropBox">
    <input type="file" id="fileInput" accept="image/*" name="image">
    <label for="fileInput">Drop image here or click to upload</label>
  </div>
  <div class="staffimg-preview" id="preview"></div>
                    </div>

                    <div class="input-field-container" style="display: flex;
                                                    flex-direction: column;
                                                    gap:2rem;
                                                    padding: 10px;
                                                    ">
                      <div class="input-field">  
                          <label for="role">Select Role</label>
                        <select name="role" id="role">
                            <option value="roleid" selected>Select Roles</option>
                            @foreach ($rolelist as $role )
                            <option value="{{$role['id']}}">{{$role['name']}}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="input-field">  
                        <label for="password">Password:</label>
                        <input type="password" style="width: 100% " name="password">
                      </div>
                    </div>
                </div>

                <div class="btn-field">
                    <button>
                        <a href="{{route('admin.staff.create.process')}}">Submit</a>
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection




  <script>
    const dropBox = document.getElementById('dropBox');
    const fileInput = document.getElementById('fileInput');
    const preview = document.getElementById('preview');

    dropBox.addEventListener('dragover', (e) => {
      e.preventDefault();
      dropBox.style.backgroundColor = '#e2e2e2';
    });

    dropBox.addEventListener('dragleave', () => {
      dropBox.style.backgroundColor = '#fff';
    });

    dropBox.addEventListener('drop', (e) => {
      e.preventDefault();
      dropBox.style.backgroundColor = '#fff';
      const file = e.dataTransfer.files[0];
      handleFile(file);
    });

    fileInput.addEventListener('change', () => {
      const file = fileInput.files[0];
      handleFile(file);
    });

    function handleFile(file) {
      preview.innerHTML = '';
      if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = () => {
          const img = new Image();
          img.src = reader.result;
          img.classList.add('preview-img');
          preview.appendChild(img);
        };
        reader.readAsDataURL(file);
      } else {
        alert('Please choose an image file.');
      }
    }
  </script>
</body>
</html>

