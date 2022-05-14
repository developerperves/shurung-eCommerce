@foreach($datas as $data)
<tr>

    <td>
        {{ $data->name }}
    </td>
    <td>
        {{ $data->slug }}
    </td>
    <td>

        <div class="dropdown">
            <button class="btn btn-{{  $data->status == 1 ? 'success' : 'danger'  }} btn-sm  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{  $data->status == 1 ? __('Enabled') : __('Disabled')  }}
            </button>
            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ route('bcategory.status',[$data->id,1]) }}">{{ __('Enable') }}</a>
              <a class="dropdown-item" href="{{ route('bcategory.status',[$data->id,0]) }}">{{ __('Disable') }}</a>
            </div>
          </div>

        </div>

    </td>
    <td>
        <div class="action-list">
            <a class="btn btn-secondary btn-sm "
                href="{{ route('bcategory.edit',$data->id) }}">
                <i class="flaticon-edit"></i>
            </a>
            <a class="btn btn-danger btn-sm " data-toggle="modal"
                data-target="#confirm-delete" href="javascript:;"
                data-href="{{ route('bcategory.destroy',$data->id) }}">
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
            {{ __('You are going to delete this category. All contents related with this category will be lost.') }} {{ __('Do you want to delete it?') }}
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
            <form action="{{ route('bcategory.destroy',$data->id) }}" class="d-inline btn-ok" method="POST">

                @csrf

                @method('DELETE')

                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>

            </form>
        </div>

    </div>
    </div>
</div>
@endforeach
