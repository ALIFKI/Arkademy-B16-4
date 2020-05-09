<html>
    <head>
        <title>ALIFKHI-POSTCRUD-Arkademy</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <!-- Logo Arkademy -->
        <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="https://www.arkademy.com/img/logo%20arkademy.1c82cf5c.svg" width="70" height="70">
        </a>
        <input class="search form-control" type="text" placeholder="Search">
        <form class="form-inline">
            <!-- Triggred Modal -->
          <a href="#" class="btn btn-warning mb-2 auto" id="new-product" data-toggle="modal" data-target="#add-modal">ADD</a>
        </form>
        </nav>

        <div class="container">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p id="msg">{{ $message }}</p>
            </div>
            @endif
            <table class="table">
                <thead class="thead primary">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Cashier</th>
                    <th scope="col">Product</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($product as $row)
                  <tr id="product_id_{{ $row->id }}">
                    <th scope="row">{{$row->id}}</th>
                    <td>{{$row->get_cashier->name}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->get_category->name}}</td>
                    <td>Rp.{{$row->price}}</td>
                    <td>
                        <form action="" method="post">
                            <a href="#" class="btn btn-success" id="edit-product" data-toggle="modal" data-id="{{$row->id}}">Edit </a>
                            <a id="delete" data-id="{{$row->id}}" class="btn btn-danger delete-user" style="color: white" href="">Delete</a>
                        </form>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
                    <!-- Modal add and edit -->
                    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="h5">ADD</h5>
                            <button type="button" class="close" style="color: red;" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form name="formContent" action="{{url('product/store')}}" method="POST">
                                @csrf
                                    <input type="hidden" name="formid" id="formid" >
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                <select  type="text" name="cashier" id="cashier" class="form-control">
                                                    <option value="">Cashier</option>
                                                    <option value="2">Raisa Andriana</option>
                                                    <option value="1">Pevita Pearce</option>
                                                    <option value="3">Alifkhi Miftahul Janah</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-14 col-sm-14 col-md-14">
                                                <div class="form-group">
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Product" >
                                                </div>
                                            </div>
                                            <div class="col-xs-14 col-sm-14 col-md-14">
                                                <div class="form-group">
                                                <select  type="text" name="category" id="category" class="form-control">
                                                    <option >Category</option>
                                                    <option value="1">Food</option>
                                                    <option value="2">Drink</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-14 col-sm-14 col-md-14">
                                                <div class="form-group">
                                                    <input type="text" name="price" id="price" class="form-control" placeholder="Price">
                                                </div>
                                            </div>
                                        </div>
                                    
                            </div>
                            <div class="modal-footer">
                            <input type="submit" name="btnsave" class="btn btn-warning mb-2" id="btnsave" value="submit">
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
        </div>
    </body>

    <script>

        $('body').on('click', '#edit-product', function () {
        var product_id = $(this).data('id');
        console.log($(this).data('id'))
        $.get('edit/'+product_id+'', function (data) {
            console.log(data)
        $('#h5').html("EDIT");
        $('#btnupdate').val("Update");
        $('#add-modal').modal('show');
        $('#formid').val(data.id);
        $('#btnsave').val("edit");
        $('#name').val(data.name);
        $("div.form-grup > select > option[value=" + data.cashier + "]").prop("selected",true);
        $('#cashier').val(data.id_cashier);
        $('#category').val(data.id_category);
        $('#price').val(data.price);

        })
        });
        $('#new-product').click(function () {
        $('#btn-save').val("create-product");
        $('#product').trigger("reset");
        $('#h5').html("ADD");
        $('#crud-modal').modal('show');
        $('#btnsave').val("submit");
        });

        $('body').on('click', '#delete', function () {
        var product_id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        confirm("Apakah anda yakin ingin hapus?");

        $.ajax({
        type: "GET",
        url: "http://localhost:8000/hapus/produk/"+product_id,
        data: {
        "id": product_id,
        "_token": token,
        },
        success: function (data) {
            console.log(data)
        $('#msg').html('Delete Success');
        $("#product_id_" + product_id).remove();
        },
        error: function (data) {
        console.log('Error:', data);
        }
        });
        });
    </script>
</html>