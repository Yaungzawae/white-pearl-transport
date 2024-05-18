@include("template/head",["css"=>"home"])
@include("template/navbar")

<div class="body-container">
    @include("template/detailbox", ["data" => $data])
    
    <div class="general-details">
        <div>
            <p>Home: {{$data["g1_address"]}}</p>
            <p>General Info</p>
        </div>
        <p><?phpecho date("d/m/y");?></p>
    </div>

    <div class="bus-info">
        <div>
            <p>Leaving Home : {{$data["home_to_school"]}}</p>
            <a class="clickable-text" href="./home_to_school_details">Bus no xx</a>
            <a class="clickable-text" href="./home_to_school_map">Gps</a    >
            <p class="clickable-text">Cctv</p>
        </div>
    </div>
    <div class="bus-info">
        <div>
            <p>Leaving Home : {{$data["school_to_home"]}}</p>
            <a class="clickable-text" href="/school_to_home_details">Bus no xx</a>
            <a class="clickable-text" href="./school_to_home_map">Gps</a>
            <p class="clickable-text">Cctv</p>
        </div>
    </div>
</div>

@include("template/footer")
@include("template/foot")
