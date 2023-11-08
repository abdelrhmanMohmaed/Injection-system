<div class="row">
    <div class="col-xs-12">
        <div class="box box-solid box-info">
            <div class="box-header">
                <h3 class="box-title">
                    Role </h3>
            </div>
            <div class="box-body">
                <form action="{{url('edit/role/'.$role->id)}}" method="post">
                    @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label><br>
                            <input class="form-control" name="name" value="{{$role->name}}" required>
                        </div>
                    </div>
                </div>
                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">{{ __('Permissions :') }}</label>
                            <br/>
                            @foreach($permissions as $permission)
                                <label style="width:32%; display: inline-block"><input  type="checkbox" {{(in_array($permission->id,$rolePermissions)?'checked':'')}}  name="permissions[]" value="{{$permission->id}}">
                                    {{$permission->name}}</label>
                            @endforeach
                        </div>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>
