        function fetchCustomers(query = '', group = '', created_by = '') {
            $.ajax({
                url: "/customers",
                method: 'GET',
                data: {
                    search: query,
                    group: group,
                    created_by: created_by
                },
                success: function(data) {
                    $('#customer-table tbody').html(data);
                }
            });
        }

        $('#search').on('keyup', function() {
            var searchQuery = $(this).val();
            var groupFilter = $('#group-filter').val();
            var createdByFilter = $('#created-by-filter').val();
            fetchCustomers(searchQuery, groupFilter, createdByFilter);
        });
        
        $('#group-filter, #created-by-filter').on('change', function() {
            var searchQuery = $('#search').val();
            var groupFilter = $('#group-filter').val();
            var createdByFilter = $('#created-by-filter').val();
            fetchCustomers(searchQuery, groupFilter, createdByFilter);
        });

