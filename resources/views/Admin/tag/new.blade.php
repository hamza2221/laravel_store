@extends('Admin.main')
@section('title','New Tag | Admin')
@section('content')
@section('page_header','New Tag')
<div class="row">


                                <div class="col-lg-6">
                                    <form method="post" action="{{url('admin/tags')}}" role="form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input  name="name" value="{{old('name')}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>

                           
@endsection
