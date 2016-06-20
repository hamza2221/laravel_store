@extends('Admin.main')
@section('title','New Products | Admin')
@section('content')
@section('page_header','New Products')
<div class="row">


                                <div class="col-lg-6">
                                    <form method="post" action="{{url('admin/products')}}" role="form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input  name="title" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input name="price" class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>User</label>
                                            <select class="form-control" name="user_id">
                                            	<option></option>
                                            </select >
                                        </div>

                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="category_id">
                                            	@foreach($data['categories'] as $i)
                                                    <option value="{{$i->ID}}">{{$i->name}}</option>
                                                @endforeach
                                            </select >
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select  class="form-control" name="status">
                                            	<option>Enable</option>
                                            	<option>Disable</option>
                                            </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Quantity Available</label >
                                            <input type="text" name="quantity_available" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Sort Order</label >
                                            <input type="text" name="sort_order" class="form-control">
                                        </div>


                                        <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>

                           
@endsection
