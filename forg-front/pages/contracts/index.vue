<template>
    <v-container justify="centre">
        <v-row justify="space-around">

        <v-card elevation="12" flex d-flex flex-column class="h-auto" sm="4" style="overflow-y:scroll;
                   height: 250px"
          aspect-ratio="1" >
            <div class="text-left ">
                <v-toolbar >
                <v-btn color="black" @click="formTitle = 'Add Contract', resetModel()">
                    Add Contract
                    <v-dialog v-model="dialog" activator="parent" width="auto">
                        <v-card>
                            <v-card-title>
                                <span class="text-h5">{{ formTitle }}</span>
                            </v-card-title>
                            <v-form>
                                <v-container>
                                    <v-row>
                                        <v-col cols="12">
                                            <v-text-field v-model="sign_date" label="Sign date" type="date"></v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field v-model="sign_place" label="Sign place"></v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field v-model="customer" label="Customer"></v-text-field>
                                        </v-col><v-col cols="12">
                                            <v-text-field v-model="signee" label="Signee"></v-text-field>
                                        </v-col><v-col cols="12">
                                            <v-text-field v-model="price" label="Price, eur"></v-text-field>
                                        </v-col><v-col cols="12">
                                            <v-text-field v-model="tax" label="Tax, %"></v-text-field>
                                        </v-col><v-col cols="12">
                                            <v-text-field v-model="advance_payment_sum"
                                                label="Advance payment, eur"></v-text-field>
                                        </v-col>
                                    </v-row>
                                </v-container>
                            </v-form>
                            <v-card-actions>
                                <v-spacer />
                                <v-btn color="primary" @click="dialog = false">Close</v-btn>
                                <v-btn color="warning" @click="handleSubmit">Submit</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </v-btn>
                <v-spacer></v-spacer>
                <v-btn href="" @click.prevent="$router.back()" color="black">Back</v-btn>
            </v-toolbar>
                <v-dialog v-model="dialogDelete" width="auto">
                    <v-card>
                        <v-card-title class="text-h5">Are you sure you want to delete this item?</v-card-title>
                        <v-card-actions>
                            <v-spacer />
                            <v-btn color="primary" @click="dialogDelete = false">Close</v-btn>
                            <v-btn color="error" @click="deleteContract">Delete</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </div>
            <v-divider></v-divider>
            <div id="app">
                <v-data-table class="{'v-data-table'}" sm="4" :headers="headers" :loading="loading" :items="items" :items-per-page="5">
                    <template v-slot:loading>
                        <v-skeleton-loader type="table-row@10"></v-skeleton-loader>
                    </template>
                    <template v-slot:item.actions="{ item }">
                        <v-tooltip location="top">
                            <template v-slot:activator="{ props }">
                                <v-icon v-bind="props" size="small" class="me-2" @click="editItem(item)">
                                    mdi-pencil
                                </v-icon>
                            </template>
                            <span>Edit Contract</span>
                        </v-tooltip>
                        <v-tooltip location="top" v-if="canDestroy">
                            <template v-slot:activator="{ props }">
                                <v-icon v-bind="props" size="small" class="me-2" @click="deleteItem(item)">
                                    mdi-delete </v-icon>
                            </template>
                            <span>Delete Contract</span>
                        </v-tooltip>
                        <v-tooltip location="top">
                            <template v-slot:activator="{ props }">
                                <v-icon v-bind="props" size="small" @click="viewBills(item)"> mdi-eye-outline
                                </v-icon>
                            </template>
                            <span>Show contracts' bills</span>
                        </v-tooltip>
                    </template>
                </v-data-table>
            </div>
        </v-card>
        </v-row>
    </v-container>
</template>

<script setup lang ='ts'>



const isMobile = ref(false)

definePageMeta({
    middleware: 'auth'
})
const canDestroy = ref(false)
canDestroy.value = useCookie('roles').value == 'admin'

const dialog = ref(false)
const dialogDelete = ref(false)
const sign_date = ref(Date.now())
const sign_place = ref('')
const customer = ref('')
const signee = ref('')
const price = ref(0)
const tax = ref(0)
const advance_payment_sum = ref(0)
const formTitle = ref('Add Contract')
const isEdit = ref(false)
const items = ref([])
const id = ref(0)

const loading = ref(true)
getContracts()

const headers = ref([
    { title: "Id", key: "id" },
    { title: "Date signed", key: "sign_date" },
    { title: "Place signed", key: "sign_place" },
    { title: "Customer", key: "customer" },
    { title: "Signee", key: "signee" },
    { title: "Price, eur", key: "price" },
    { title: "Creators' id", key: "user_id" },
    { title: "Tax, %", key: "tax" },
    { title: "Advance payment made", key: "advance_payment_sum" },
    { title: 'Actions', key: 'actions', sortable: false },

])
async function getContracts() {
    const { data } = await backFetch('/contracts', {
        method: 'GET',
        headers: { 'Accept': 'application/json' },
    })
    items.value = data.value
    loading.value = false
}



async function addContract() {
    await backFetch('/contracts', {
        method: 'POST',
        body: {
            sign_date: sign_date.value,
            sign_place: sign_place.value,
            customer: customer.value,
            signee: signee.value,
            price: price.value,
            tax: tax.value,
            advance_payment_sum: advance_payment_sum.value
        },
        headers: { 'Accept': 'application/json' },
    })
    dialog.value = false
    isEdit.value = false

    getContracts()
}

async function editContract() {
    await backFetch('/contracts/' + id.value, {
        method: 'PUT',
        body: {
            sign_date: sign_date.value,
            sign_place: sign_place.value,
            customer: customer.value,
            signee: signee.value,
            price: price.value,
            tax: tax.value,
            advance_payment_sum: advance_payment_sum.value
        },
        headers: { 'Accept': 'application/json' },
    })
    dialog.value = false
    isEdit.value = false
    formTitle.value = 'Add Contract'

    getContracts()
}
async function deleteContract() {
    await backFetch('/contracts/' + id.value, {
        method: 'DELETE',
        headers: { 'Accept': 'application/json' },
    })
    dialogDelete.value = false

    getContracts()
}
function editItem(item) {
    formTitle.value = 'Edit Contract'
    id.value = item.id
    sign_date.value = item.sign_date
    sign_place.value = item.sign_place
    customer.value = item.customer
    signee.value = item.signee
    price.value = item.price
    tax.value = item.tax
    advance_payment_sum.value = item.advance_payment_sum
    isEdit.value = true
    dialog.value = true
}
function deleteItem(item) {
    id.value = item.id
    dialogDelete.value = true

}
function handleSubmit() {
    if (isEdit.value) {
        editContract()
    }
    else addContract()
}

function viewBills(item) {
    navigateTo('/contracts/' + item.id + '/bills')
}

function resetModel() {
    sign_date.value = Date.now()
    sign_place.value = ''
    customer.value = ''
    signee.value = ''
    price.value = 0
    tax.value = 0
    advance_payment_sum.value = 0
}
</script>

<style scoped>
.v-data-table {
    overflow-x: auto;
    max-width: 100%;
}
</style>