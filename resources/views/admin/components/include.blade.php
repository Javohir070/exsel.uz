@include('admin.components.tash_status_button')
@include('admin.components.tash_status_modal',
['model'=>$ilmiyloyiha, 'action' => route('tashkilot_ilmiyloyiha', $ilmiyloyiha->id),])
