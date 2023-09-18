<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css');
  <meta name="csrf-token" content="{{ csrf_token() }}">
    
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" >
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <link  href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar');
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar');
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper" style="background-color: #ffff">
            @if(session()->has('message'))
             <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
             </div>
            @endif
        <div class="modal fade" id="category-modal" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
            <div class="modal-body">
                <form action="javascript:void(0)" id="CategoryForm" name="CategoryForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" maxlength="50" required="">
                        </div>
                    </div>  
                    
                    
                    <div class="col-sm-offset-2 col-sm-10"><br/>
                        <button type="submit" class="btn btn-primary" style="background-color: brown" id="btn-save">Save changes</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12 margin-tb">
    
      <div class="pull-right mb-2">
          <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Add Category</a>
      </div>
  </div>
</div> 
            @if(session()->has('message'))
              <div class="alert alert-success">
                {{session()->get('message')}}
              </div>
            @endif
           
            <table class="center" id="ajax-crud-datatable">
              <caption style="caption-side:initial">Category Information</caption>
            <thead class="table-dark">
                <tr>
                    <td>#</td>
                    <td>Catagory</td>
                    <td>Action</td>
                </tr>
            </thead>
            
            </table>
           
          </div>
          </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script');
    <!-- End custom js for this page -->
    <script type="text/javascript">
      $(document).ready( function () {
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let table = new DataTable('#ajax-crud-datatable', {
        
        
            processing: true,
            serverSide: true,
            ajax: "{{ url('all-category') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'action', name: 'action', orderable: false},
               
            ],
            order: [[1, 'asc']]
        });
        table.on('order.dt search.dt', function () {
            let i = 1;
    
            table
                .cells(null, 0, { search: 'applied', order: 'applied' })
                .every(function (cell) {
                    this.data(i++);
                });
        }).draw();
    });
       
function add(){
    $('#CategoryForm').trigger("reset");
    $('#CategoryModal').html("Add Category");
    $('#category-modal').modal('show');
    $('#id').val('');
}   
  
    function editFunc(id){
    $.ajax({
        type:"POST",
        url: "{{ url('edit-category') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){
            $('#CategoryModal').html("Edit Category");
            $('#category-modal').modal('show');
            $('#id').val(res.id);
            $('#name').val(res.name);
            
        }
    });
}  
 
function deleteFunc(id){
    if (confirm("Delete Record?") == true) {
        var id = id;
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('delete-category') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                var oTable =  new DataTable('#ajax-crud-datatable');
                oTable.draw(false);
            }
        });
    }
}
$('#CategoryForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type:'POST',
        url: "{{ url('add-category')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            $("#category-modal").modal('hide');
            var oTable =  new DataTable('#ajax-crud-datatable');
            oTable.draw(false);
            $("#btn-save").html('Submit');
            $("#btn-save"). attr("disabled", false);
        },
        error: function(data){
            console.log(data);
        }
    });
});
  </script>

  </body>
</html>

