
@foreach($datas as $data)
<tr>
    <tr>
        <td>
            <img style="width: 50px;" src="{{ $data->photo ? asset('assets/images/'.$data->photo) : asset('assets/images/placeholder.png') }}" alt="Image Not Found">
        </td>
        <td>
            {{ $data->name }}
        </td>
        <td>
            {{ $data->designation }}
        </td>
    <td>
        <div class="action-list">
            <a class="btn btn-secondary btn-sm "
                href="{{ route('team.edit',$data->id) }}">
                <i class="flaticon-edit"></i>
            </a>
            <a class="btn btn-danger btn-sm " data-toggle="modal"
            data-target="#confirm-delete" href="javascript:;"
            data-href="">
                <i class="flaticon-delete"></i>
            </a>
        </div>
    </td>
</tr>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __('Confirm Delete?') }}</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
            {{ __('You are going to delete this team. All contents related with this team will be lost.') }} {{ __('Do you want to delete it?') }}
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
            <form action="{{ route('team.destroy',$data->id) }}" class="d-inline btn-ok" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
            </form>
        </div>
    </div>
    </div>
    </div>
@endforeach