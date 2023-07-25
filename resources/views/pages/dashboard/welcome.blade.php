@extends('layouts.general')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <br><br><br><br><br><br><br><br><br><br>
                <img src="{{ asset('assets/images/loading-gif.gif') }}" alt=""
                    class="welcome_loader img-fluid  w-20 h-20">
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            var UserMandate = @json(session()->get('UserMandate'));
            var UserRegion_ = @json(session()->get('Region'));
            var UserConstituency_ = @json(session()->get('Constituency'));

            setTimeout(function() {
                {{-- return false; --}}

                if (UserMandate === "NationalLevel") {
                    window.location = 'home'
                    return

                    let getAllRegions = [];
                    let totalAssignedPollingStations = 0;
                    let totalUnassignedPollingStations = 0;

                    let regionName = [];
                    let constituencyData = [];

                    async function getUserDetails() {
                        const collectionRef = db.collection("pollingStation");

                        collectionRef
                            .get()
                            .then((querySnapshot) => {
                                querySnapshot.forEach((doc) => {
                                    // Access the document data
                                    //console.log("all data=>", doc.data())
                                    var allRegionDetails = doc.data();
                                    getAllRegions.push(allRegionDetails);

                                    //var allRegions = allRegionDetails.filter(doc.region)
                                    // console.log(doc.id, '=>', doc.data());
                                    //conaole.log("allRegions=>", allRegions)
                                });

                                //GET TOATAL POLLING STATIONS
                                let allPollingStations = getAllRegions.length
                                console.log("getAllRegions=>", getAllRegions.length);
                                //return

                                getAllRegions.forEach((e) => {
                                    if (
                                        e.userId === undefined ||
                                        e.userId === null ||
                                        e.userId.length < 5
                                    ) {
                                        //console.log(`${key} unassigned station=>`, pollingStation.userId)
                                        totalUnassignedPollingStations++;
                                    } else {
                                        totalAssignedPollingStations++;
                                        //console.log(`${key} assigned station=>`, pollingStation.userId)
                                    }
                                });

                                // SORT OUT INTO REGIONS
                                const regionConstituency = getAllRegions.reduce(
                                    (acc, getAllRegion) => {
                                        const {
                                            region
                                        } = getAllRegion;

                                        if (!acc[region]) {
                                            acc[region] = [];
                                        }

                                        acc[region].push(getAllRegion);
                                        return acc;
                                    }, {}
                                );

                                console.log("regionConstituency =>", regionConstituency);
                                //const

                                //return;

                                let totalAssigned = 0;
                                let totalUnAssigned = 0;
                                let total = 0;

                                for (let key in regionConstituency) {
                                    if (regionConstituency.hasOwnProperty(key)) {
                                        const group = regionConstituency[key];
                                        regionName.push(`${key}`);
                                        //console.log(`Group: ${key}`);
                                        //console.log("all groups:", group)
                                        for (let i = 0; i < group.length; i++) {
                                            var assigned = 0;
                                            var unAssigned = 0;
                                            //const student = group[i];

                                            const pollingStation = group[i];
                                            //console.log("pollingStation=>", pollingStation);

                                            group.forEach((e) => {
                                                //console.log("eeeeee=>", e);
                                                //return

                                                if (`${key}` === e.region) {
                                                    //console.log(`${key}`, pollingStation?.length)
                                                    //console.log(`${key}`, pollingStation?.userId?.length)
                                                    //console.log(`${key} unassigned station=>`, pollingStation?.userId?.length)
                                                    if (
                                                        e.userId === undefined ||
                                                        e.userId === null ||
                                                        e.userId.length < 5
                                                    ) {
                                                        //console.log(`${key} unassigned station=>`, pollingStation.userId)
                                                        unAssigned++;
                                                    } else {
                                                        assigned++;
                                                        //console.log(`${key} assigned station=>`, pollingStation.userId)
                                                    }
                                                }
                                            });

                                            //console.log(`${key} =>`, unAssigned, assigned)
                                        }

                                        var _total = assigned + unAssigned;
                                        totalAssigned += assigned;
                                        totalUnAssigned += unAssigned;
                                        total += _total;
                                        constituencyData.push({
                                            region: `${key}`,
                                            total: _total,
                                            assigned,
                                            unAssigned,
                                        });
                                    }
                                }

                                console.log(
                                    "totalAssignedPollingStations=>",
                                    totalAssignedPollingStations
                                );
                                console.log(
                                    "totalUnassignedPollingStations=>",
                                    totalUnassignedPollingStations
                                );


                                /*  sessionStorage.setItem({
                                          "totalAssignedPollingStations": totalAssignedPollingStations,
                                          "totalUnassignedPollingStations": totalUnassignedPollingStations,
                                          "constituencyData": constituencyData,
                                          "getAllRegions": getAllRegions
                                      }); */

                                var thisAllRegionsData = JSON.stringify(constituencyData)
                                var thisAllRegionsonstituencies = JSON.stringify(regionConstituency)

                                sessionStorage.setItem(
                                    "totalAssignedPollingStations",
                                    totalAssignedPollingStations
                                );
                                sessionStorage.setItem(
                                    "totalUnassignedPollingStations",
                                    totalUnassignedPollingStations
                                );
                                sessionStorage.setItem("allPollingStations", allPollingStations);
                                sessionStorage.setItem("constituencyData", thisAllRegionsData);
                                sessionStorage.setItem("getAllRegions", getAllRegions.length);
                                {{--  sessionStorage.setItem("thisAllRegionsonstituencies",
                                    thisAllRegionsonstituencies);  --}}

                                //

                            })
                            .catch((error) => {
                                console.log("Error getting documents:", error);
                            });

                        return;
                        //var getDeatils = await db.collection('users').doc("0277100400").get();
                        //var getDeatils = await db.collection('pollingStation').get();
                        //var data = getDeatils.data()
                        //console.log("getData=>", data)
                        //console.log("getData=>", getDeatils.docs())
                    }

                    //getUserDetails();
                } else if (UserMandate === 'RegionalLevel') {
                    if (UserRegion_.indexOf(' ') >= 0) {
                        {{-- alert("contains spaces"); --}}
                        var request = UserRegion_
                        UserRegion = request.replace(/ /g, "_");
                        window.location.href = `{{ url('region/${UserRegion}') }}`
                    } else {
                        window.location.href = `{{ url('region/${UserRegion_}') }}`
                    }

                } else if (UserMandate === 'ConstituencyLevel') {
                    if (UserConstituency_.indexOf(' ') >= 0) {
                        {{-- alert("contains spaces"); --}}
                        var request = UserConstituency_
                        UserConstituency = request.replace(/ /g, "_");
                        window.location.href = `{{ url('constituency/${UserConstituency}') }}`
                    } else {
                        window.location.href = `{{ url('constituency/${UserConstituency_}') }}`
                    }

                } else {
                    return back();
                }
            }, 2000)





        })
    </script>
@endsection
