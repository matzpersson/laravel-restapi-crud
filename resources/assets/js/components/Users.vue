<template>
  <div>

    <vuetable ref="vuetable"
        api-url="/api/users/paginate"
        :fields="fields"
        pagination-path=""
        :css="css.table"
        :sort-order="sortOrder"
        :multi-sort="true"
        :append-params="moreParams"
        :http-options="headers"
        @vuetable:cell-clicked="onCellClicked"
        @vuetable:pagination-data="onPaginationData"
        >

    </vuetable>

    <div class="vuetable-pagination">
      <vuetable-pagination-info ref="paginationInfo"
        info-class="pagination-info"
      ></vuetable-pagination-info>

      <vuetable-pagination ref="pagination"
        :css="css.pagination"
        @vuetable-pagination:change-page="onChangePage"
      ></vuetable-pagination>

    </div>

  </div>

</template>

<script>

    import Listview from '../utilities/Listview.js'

    export default {

        mixins: [Listview.mixins],
        data () {
            return {
                headers: { headers: auth.getAuthHeader() },
                fields: [
                    {
                      name: 'id',
                      sortField: 'id',
                    },
                    {
                      name: 'name',
                      sortField: 'name',
                    },
                    {
                      name: 'email',
                      sortField: 'email'
                    }
                ],
                sortOrder: [
                  { field: 'name', sortField: 'name', direction: 'asc'}
                ]
            }
        },

        methods: {

            onCellClicked (data, field, event) {
                console.log('cellClicked: ', field.name)
                this.currentRow = data
                this.showModal = true               
            },
            closeModal() {

            }
        }

    }
</script>

<style>



</style>
