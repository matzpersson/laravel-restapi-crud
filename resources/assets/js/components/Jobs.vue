<template>
  <div>

    <div class="nav navbar-default navbar-toolbar">
        <div class="navbar-left navbar-brand">Manage Jobs</div>
        <div class="navbar-right"><button class="navbar-btn btn btn-primary btn-sm" @click="showModal=true">Add Job</button></div>
    </div>

    <vuetable ref="vuetable"
        api-url="/api/jobs/paginate"
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

        <template slot="status-action" scope="props">  
            <div class="dropdown" >
                <button style="width: 100px;" class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown" v-text="props.rowData.status.name">Dropdown Example
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" >
                    <li v-for="status in statuses">
                        <a href="#" @click="setStatus(props.rowData, status)">{{ status.name }}</a>
                    </li>
                </ul>
            </div> 
        </template>

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

    <job v-if="showModal" @close="closeModal" v-bind:rowData="currentRow" v-bind:statuses="statuses"></job>

  </div>

</template>

<script>

    import Listview from '../utilities/Listview.js'
    import lookupStatus from '../models/LookupStatus.js'
    import lookupUser from '../models/User.js'
    import JobActions from './JobActions'
    import Job from './Job'

    Vue.component('job-actions', JobActions)
    Vue.component('job', Job)

    export default {

        mixins: [Listview.mixins],

        created() {

            lookupStatus.all( data => this.statuses = data )
            lookupUser.all( data => this.users = data )

        },

        data () {
            return {
                headers: { headers: auth.getAuthHeader() },
                showModal: false,
                currentRow : {},
                statuses: [],
                users: [],
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
                      name: 'description',
                      sortField: 'progress'
                    },
                    {
                      name: 'progress',
                      sortField: 'progress',
                      titleClass: 'text-center progress-title',
                      dataClass: 'text-center',
                      callback: 'formatProgress'
                    },
                    {
                      name: '__slot:status-action',   // <----
                      title: 'Status',
                      titleClass: 'text-center status-action',
                      dataClass: 'text-center'
                    },
                    {
                      name: '__component:job-actions',
                      title: 'Actions',
                      titleClass: 'text-right job-actions',
                      dataClass: 'text-right'
                    }
                ],
                sortOrder: [
                  { field: 'name', sortField: 'name', direction: 'asc'}
                ]
            }
        },

        methods: {
            setProgressColour(progress) {
                if (progress < 50) {
                    return 'btn-sm btn-warning'
                } 
                if (progress > 50 && progress < 100) {
                    return 'btn-sm btn-info'
                }
                if (progress == 100) {
                    return 'btn-sm btn-success'
                }
            },
            formatProgress(value) {
                var className = this.setProgressColour(value)
                return '<div class="' + className + '" style="font-size: 14px;">' + value + '%</div>'
            },
            setStatus(row, newStatus) {
                
                var progress = row.progress
                if (newStatus.tag == "done") {
                    progress = 100;
                } 

                var form = new Form({"id": row.id, "name": row.name, "status_id": newStatus.id, "progress": progress})
                form.save('/api/jobs')
                this.$refs.vuetable.refresh()
            },

            onCellClicked (data, field, event) {
                console.log('cellClicked: ', field.name)
                this.currentRow = data
                this.showModal = true
                
            },
            closeModal() {
                this.currentRow = {}
                this.showModal = false

            }
        },

        events: {
            'update-item' (filterText) {
                Vue.nextTick( () => this.$refs.vuetable.refresh() )
            },
            'edit-item' (rowData) {
                this.currentRow = rowData
                this.showModal = true
                Vue.nextTick( () => this.$refs.vuetable.refresh() )
            }


      }
    }
</script>

<style>

    .job-actions {
        width: 120px;
    }

    .progress-title {
        width: 100px;
    }

</style>
