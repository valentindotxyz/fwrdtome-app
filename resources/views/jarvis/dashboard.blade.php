@extends('jarvis.template')

@section('content')

    <div class="row">
        <div class="col">
            <h5>Subscriptions per sources</h5>
            <canvas id="subscriptions-per-sources" height="120px"></canvas>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h5>Sendings</h5>
            <canvas id="sendings" height="120px"></canvas>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
    <script type="text/javascript">
        const subscriptionsBySources = {!! $subscriptionsBySources !!};
        const sendings = {!! $sendings !!};

        const subscriptionsBySourcesDates = subscriptionsBySources.reduce((dates, subscription) => {
            if (dates.indexOf(subscription.date) === -1) {
                dates.push(subscription.date);
            }
            return dates;
        }, []);

        const subscriptionsBySourcesDatesCounts = {
            bookmarklet: getSubscriptionsCountForSourceByDate(subscriptionsBySourcesDates, subscriptionsBySources, "bookmarklet"),
            chrome: getSubscriptionsCountForSourceByDate(subscriptionsBySourcesDates, subscriptionsBySources, "chrome"),
            ios: getSubscriptionsCountForSourceByDate(subscriptionsBySourcesDates, subscriptionsBySources, "ios")
        };

        var subscriptionsBySourcesChart = document.getElementById("subscriptions-per-sources");
        new Chart(subscriptionsBySourcesChart, {
            type: 'bar',
            data: {
                labels: subscriptionsBySourcesDates,
                datasets: [
                    { label: 'Bookmarklet', backgroundColor: "#3F51B5", data: subscriptionsBySourcesDatesCounts.bookmarklet },
                    { label: 'Chrome', backgroundColor: "#009688", data: subscriptionsBySourcesDatesCounts.chrome },
                    { label: 'iOS', backgroundColor: "#8BC34A", data: subscriptionsBySourcesDatesCounts.ios }
                ]
            },
            options: {
                title: { display: false },
                tooltips: { mode: 'index', intersect: false },
                scales: { xAxes: [{ stacked: true }], yAxes: [{ stacked: true }]}
            }
        });

        var sendingsChart = document.getElementById("sendings");
        new Chart(sendingsChart, {
            type: 'line',
            data: {
                labels: sendings.map(sending => sending.date),
                datasets: [{
                    label: "Sendings",
                    backgroundColor: "#8BC34A",
                    borderColor: "#8BC34A",
                    data: sendings.map(sending => sending.count),
                }]
            }
        });

        function getSubscriptionsCountForSourceByDate(subscriptionsBySourcesDates, subscriptionsBySources, source)
        {
            return subscriptionsBySourcesDates.map(subscriptionDate => {
                var subscriptionBySourceForDate = subscriptionsBySources.filter(subscription => subscription.date === subscriptionDate && subscription.source === source);

                if (!subscriptionBySourceForDate.length)
                    return 0;

                return subscriptionBySourceForDate[0].count;
            });
        }
    </script>

@endsection