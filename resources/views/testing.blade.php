<script src="{{url('js/axios.js')}}"></script>
<script src="{{url('adminbite/assets/libs/jquery/dist/jquery.min.js')}}"></script>
<button id="tombol">tekan</button>
<select name="" id="propinsi">
    <option value="">Pilih Propinsi</option>
</select>
<select name="" id="kab">
    <option value="">Pilih Kabupaten</option>
</select>
<select name="" id="kec">
        <option value="">Pilih Kecamatan</option>
    </select>
<div id="kabupaten"></div>
<script>
    $(function(){
        console.log("cocok")
    var urlkab = '{{url('json/propinsi.json')}}'
    axios.get(urlkab).then(function(response){
        // console.log(response.data.length)
        for(i=0;i<response.data.length;i++){
            $("#propinsi").append("<option value='"+response.data[i].id+"'>"+response.data[i].nama+"</option>")
        }
    });
    $("#propinsi").on('change',function(){
        var idKab = $("#propinsi option:selected").val()
        urlKabs = '{{url('json/kabupaten')}}/'+idKab+'.json';
        axios.get(urlKabs).then(function(response){
        // console.log(response.data.length)
        $("#kab").empty();
        for(i=0;i<response.data.length;i++){
            $("#kab").append("<option value='"+response.data[i].id+"'>"+response.data[i].nama+"</option>")
        }
    });
    $("#kab").on('change',function(){
        var idKec = $("#kab option:selected").val()
        console.log(idKec)
        urlKec = '{{url('json/kecamatan')}}/'+idKec+'.json';
        axios.get(urlKabs).then(function(response){
        // console.log(response.data.length)
        $("#kec").empty();
        for(i=0;i<response.data.length;i++){

            $("#kec").append("<option value='"+response.data[i].id+"'>"+response.data[i].nama+"</option>")
        }
    });
    });
});
});
</script>
