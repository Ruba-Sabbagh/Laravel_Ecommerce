<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css');
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
          <div class="content-wrapper">
            @if(session()->has('message'))
             <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
             </div>
            @endif
            <div class="div_center">
                <h2 class="h2_font">Add Catagory</h2>
                <form action="{{url('/add_catagory')}}" methode="POST">
                    @csrf
                    <input type="text" name="catagory" placeholder="Category Name" class="input_color"/>
                    <input type="submit" name="submit" value="Add Category" class="btn btn-primary"/>
                </form>
            </div>
            <table class="table">
            <thead class="table-dark">
                <tr>
                    <td>Catagory</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                ...
            </tbody>
            </table>
            <table class="center">
                
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
  </body>
</html>

