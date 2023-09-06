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
                <h2 class="h2_font">Add Product</h2>
                <form class="form-horizontal" action="{{route('addproduct')}}" methode="POST">
                    @csrf
                    
                    <div class="form-group">
                      <input type="text" name="name" placeholder="Product Name" class="form-control"/>
                  </div>
                  <div class="form-group">
                    <textarea name="short_desc" placeholder="Short Descreption" class="form-control" rows="1"></textarea>
                  </div>
                  <div class="form-group">
                    <textarea name="long_desc" placeholder="Long Descreption" class="form-control" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="number" name="price" placeholder="Price" class="form-control"/>
                  </div>
                  <div class="form-group">
                    <select name="catagoryname"  class="custom-select my-1 mr-sm-2" id="category">
                        <option value=""> -- Category Name</option>
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select name="subcatagoryname"  class="custom-select my-1 mr-sm-2" id="subcategory">
                      <option value=""> -- Sub Category Name</option>
                      <option value="volvo">Volvo</option>
                      <option value="saab">Saab</option>
                      <option value="mercedes">Mercedes</option>
                      <option value="audi">Audi</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="number" name="count" placeholder="Count" class="form-control"/>
                  </div>
                  <div class="form-group">
                    <input type="file" name="img" placeholder="Img" class="form-control"/>
                  </div>
                  <div class="form-group">
                    <input type="text" name="slug" placeholder="Slug" class="form-control"/>
                  </div>
                  <div class="form-group">
                    <input  type="submit" name="submit" value="Add Product" class="btn btn-primary"/>
                    </div>
                  </form>
            </div>
            <table class="table">
              <caption style="caption-side:initial">Products Information</caption>
            <thead class="table-dark">
                <tr>
                    <td>Id</td>
                    <td>name</td>
                    <td>Short desc</td>
                    <td>Long desc</td>
                    <td>Price</td>
                    <td>Category</td>
                    <td>Sub Category</td>
                    <td>Count</td>
                    <td>Image</td>
                    <td>Slug</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>x</td>
                <td>y</td>
                <td>100</td>
                <td>1</td>
                <td>x</td>
                <td>y</td>
                <td>100</td>
                <td>1</td>
                <td>x</td>
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

