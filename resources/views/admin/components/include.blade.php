@include('admin.components.tash_status_button')
@include('admin.components.tash_status_modal',
['model'=>$ilmiyloyiha, 'action' => route('tashkilot_ilmiyloyiha', $ilmiyloyiha->id),])

@include('admin.components.file_modal', ['action' => route('asbobuskuna_import')])
