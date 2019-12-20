<style>
	ul#list-tag{
		padding: 0px;
		margin: 0px;
	}
	ul#list-tag li {list-style: none;display: inline-block;padding: 3px 6px;font-size: 15px;background: #343a40;margin: 3px;color: #fff;border-radius: 8px;position: relative;}

	ul#list-tag li span {
		padding: 5px;
		margin-left: 5px;
		cursor:pointer;
	}
	ul#suggest-tag {
    position: absolute;
    padding: 0px 10px;
    list-style: none;
    background: #e4e4e4;
    width: 94%;
    max-height: 200px;
    z-index: 999;
    overflow-y: scroll;
}

ul#suggest-tag li {
    padding: 5px;
    border-bottom: 1px solid #ffff;
    cursor: pointer;
}
</style>
 <link rel="stylesheet" href="{{asset('admin-lte/plugins/select2/css/select2.min.css')}}">
 <!-- <link rel="stylesheet" href="{{asset('admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}"> -->