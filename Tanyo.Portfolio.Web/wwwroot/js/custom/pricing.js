var pricing = (function () {
    this.url = 'https://docs.google.com/spreadsheets/d/1zjgE1PTWX42fH4eoIMzhvRhUyyYjhJ3a50YqfbZy5dk/gviz/tq?tqx=out:html&tq&gid=0&range=';

    var employmentType = {
        permanent: 0,
        contract: 1
    };

    var location = {
        onsite: 0,
        remote: 1
    };
    var address = 'A8:F11';

    this.loadPrices = function (employmentTypeId, locationId) {
        if (!employmentTypeId) {
            employmentTypeId = employmentType.contract;
        }

        if (!locationId) {
            locationId = location.remote;
        }

        if (employmentTypeId == employmentType.permanent && locationId == location.onsite) {
            address = 'H3:M6';
        } else if (employmentTypeId == employmentType.permanent && locationId == location.remote) {
            address = 'H8:M11';
        } else if (employmentTypeId == employmentType.contract && locationId == location.onsite) {
            address = 'A3:F6';
        } else if (employmentTypeId == employmentType.contract && locationId == location.remote) {
            address = 'A8:F11';
        }

        var pricingTable = $('#pricing-table');

        $.get(url + address, function (data) {
            pricingTable.html(data);

            pricingTable.addClass('table');
            pricingTable.addClass('table-fluid');
            pricingTable.addClass('table-striped');
            pricingTable.addClass('table-bordered');
        });
    }

    return {
        url: this.url,
        loadPrices: this.loadPrices
    }
}());