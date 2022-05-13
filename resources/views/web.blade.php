<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('build/css/intlTelInput.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('build/css/intlTelInput.css')}}" rel="stylesheet" type="text/css">
    <title>Lead Application Form</title>
  </head>
  <body>
    <div class="container mt-3">
        <h2>Lead Application Form</h2>
        <br>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#form">Lead Form</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#formList">Form List</a>
          </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div id="form" class="container tab-pane active">
                @if ($errors->any() || session()->has('message'))
                    <div class="col-sm-12" id="messages">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message')}}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                @endif                
                <form id="formController" action="{{ route('web.save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-20">
                            <label for="fullname">Fullname</label>
                        </div>
                        <div class="col-80">
                            <input type="text" id="fullname" name="fullname" placeholder="Fullname">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="email">Email Address</label>
                        </div>
                        <div class="col-80">
                            <input type="email" id="email" name="email" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                            <label for="phone">Phone Number</label>
                        </div>
                        <div class="col-80">
                            <input type="tel" id="phone" name="phone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-20">
                        <label for="address">Address</label>
                        </div>
                        <div class="col-80">
                        <textarea id="address" name="address" placeholder="Address" rows="5"></textarea>
                        </div>
                    </div>                
                    <div class="row">
                        <div class="col-20">
                        </div>                        
                        <div class="col-80">
                            <input type="submit" id="btnSubmit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                </form>              
            </div>
            <div id="formList" class="container tab-pane fade">
                <div class="table-responsive">
                    <table id="leadtable" class="display min-w850">
                        <thead class="table-light">
                            <tr>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($lead as $lf)
                                <tr>
                                    <td>{{ $lf->fullname }}</td>
                                    <td>{{ $lf->email }}</td>
                                    <td>{{ $lf->countrycode }} {{ $lf->phone }}</td>
                                    <td>{{ $lf->address }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>              
            </div>
        </div>
    </div>
    <!-- Datatable Css Dosyaları -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <!-- Jquery Çalıştırma Dosyarı -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Datatable Js Dosyası -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap Framework Js Dosyası -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Validation Js Dosyası -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <!-- intl-tel-input Uluslararası ülke telefon kodları js dosyası -->
    <script src="{{ asset('build/js/intlTelInput.js') }}"></script>
    <script type="text/javascript">
        // Datatable alt yapısı kullanılarak başvurular table olarak listelenmektedir.
        $(document).ready(function() {
            var table = $('#leadtable').DataTable();
            $('#leadtable tbody').on('click', 'tr', function () {
                var data = table.row( this ).data();
                alert( 'You clicked on '+data[0]+'\'s row' );
            } );
        });
   
      
        $(function () {
            var input = document.querySelector("#phone");
            window.intlTelInput(input, {
                autoHideDialCode: true,
                dropdownContainer: document.body,
                formatOnDisplay: true,
                initialCountry: "auto",
                nationalMode: true,              
                placeholderNumberType: "MOBILE", // Telefon numarasına ait açıklama varsayılan olarak mobil numara olarak belirlenmiştir.
                preferredCountries: ['tr'], // Varsayılan ülke kodu olarak Türkiye seçilmiştir.
                separateDialCode: true,
                utilsScript: "{{ asset('build/js/utils.js')}}",                
            });
        });     
        $(document).ready(function () {
            $("#formController").validate({
                    rules: {
                        "fullname": {
                            required: true,
                            minlength: 5
                        },
                        "email": {
                            required: true,
                            email: true
                        },
                        "phone":{
                            required: true,
                            minlength: 10,
                            maxlength: 15,
                            number: true
                        },             
                        "address": {
                            required: true,
                        }        
                    },
                    messages: {
                        "fullname": {
                            required: "Please, enter a name"
                        },
                        "email": {
                            required: "Please, enter an email",
                            email: "Email is invalid"
                        },
                        "phone": {
                            required: "Please, enter a phone number",
                            phone: "Phone is invalid"
                        },
                        "address": {
                            required: "Please, enter an address",
                            address: "Address is invalid"
                        }
                    },
                    submitHandler: function (formController) { // for demo
                        form.submit();
                        alert('valid form submitted'); // for demo
                        return false; // for demo
                    }
                });
            });
            
    </script>
  </body>
</html>
