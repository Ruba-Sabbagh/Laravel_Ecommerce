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
                <h2 class="h2_font">Add Sub Catagory</h2>
                <form action="{{route('addsubcategory')}}" methode="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Sub Category Name" class="input_color"/>
                    <select name="catagoryname"  class="input_color" id="category">
                        <option value=""> -- Category Name</option>
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
                      </select>
                    <input type="number" name="subcategoryproductcount" placeholder="Sub Category Product Count" class="input_color"/>
                    <input type="text" name="slug" placeholder="Slug" class="input_color"/>
                    <input type="submit" name="submit" value="Add Sub Category" class="btn btn-primary"/>
                </form>
            </div>
            <table class="table">
              <caption style="caption-side:initial">Sub Category Information</caption>
            <thead class="table-dark">
                <tr>
                    <td>Id</td>
                    <td>Sub Catagory</td>
                    <td>Catagory</td>
                    <td>Products</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>x</td>
                <td>y</td>
                <td>100</td>
                <td>
                  <a href="edit" class="btn btn-primary">Edit</a>
                  <a href="delete" class="btn btn-warning">Delete</a>
                </td>
            </tr>
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

