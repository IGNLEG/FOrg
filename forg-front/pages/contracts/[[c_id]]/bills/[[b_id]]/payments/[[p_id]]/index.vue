<template>
    <v-container justify="centre">
        <v-row justify="space-around">
            <v-card max-width="1500" elevation="12">
                <div class="text-left pt-2 pb-2 pl-2">
                    <v-toolbar>
                        <v-btn color="black" @click="formTitle = 'Add Payment', resetModel()">
                            Add Payment
                            <v-dialog v-model="dialog" activator="parent" width="auto">
                                <v-card>
                                    <v-card-title>
                                        <span class="text-h5">{{ formTitle }}</span>
                                    </v-card-title>
                                    <v-form>
                                        <v-container>
                                            <v-row>
                                                <v-col cols="12">
                                                    <v-text-field v-model="amount_paid" label="Amount paid, eur"
                                                        type="id"></v-text-field>
                                                </v-col>
                                                <v-col cols="12">
                                                    <v-text-field v-model="type" label="Payment Type"></v-text-field>
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
                                <v-btn color="error" @click="deletePayment">Delete</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                    <v-dialog v-model="dialogBill" width="auto">
                        <v-card>
                            <v-card-title class="text-h5">{{ formTitle }}</v-card-title>
                            <v-container>
                                <v-row>
                                    <v-col cols="12">
                                        <v-text-field readonly v-model="bill_id" label="Bill Id" type="id"></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-text-field readonly v-model="seller_id" label="Seller Id"
                                            type="id"></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-text-field readonly v-model="customer_id" label="Customer Id"></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-text-field readonly v-model="amount" label="Amount paid"></v-text-field>
                                    </v-col><v-col cols="12">
                                        <v-text-field readonly v-model="services" label="Services given"></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-container>
                            <v-card-actions>
                                <v-spacer />
                                <v-btn color="primary" @click="dialogBill = false">Close</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </div>
                <v-divider></v-divider>
                <v-data-table :loading="loading" :headers="headers" :items="items" class="elevation-1 {'v-data-table'}">
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
                            <span>Edit Payment</span>
                        </v-tooltip>
                        <v-tooltip location="top">
                            <template v-slot:activator="{ props }">
                                <v-icon v-bind="props" size="small" class="me-2" @click="deleteItem(item)"> mdi-delete
                                </v-icon>
                            </template>
                            <span>Delete Payment</span>
                        </v-tooltip>
                    </template>
                    <template v-slot:item.bill_id="{ item }">
                        <v-chip @click.stop="showBill(item)">{{ item.bill_id }}</v-chip>
                    </template>
                </v-data-table>
            </v-card>
        </v-row>
    </v-container>
</template>

<script setup lang ='ts'>

definePageMeta({
    middleware: 'auth'
})
const dialog = ref(false)
const dialogDelete = ref(false)
const dialogBill = ref(false)
const amount_paid = ref(0)
const bill_id = ref(0)
const type = ref(0)
const dialogContract = ref(false)
const seller_id = ref(0)
const customer_id = ref(0)
const amount = ref(0)
const services = ref('')
const formTitle = ref('')
const isEdit = ref(false)
const items = ref([])
const id = ref(0)
const { c_id } = useRoute().params
const { b_id } = useRoute().params

const loading = ref(true)
getPayments()


const headers = ref([
    { title: "Id", key: "id" },
    { title: "Amount paid, eur", key: "amount_paid" },
    { title: "Bill Id", key: "bill_id" },
    { title: "Payment Type", key: "type" },
    { title: 'Actions', key: 'actions', sortable: false },

])
async function getPayments() {
    const { data } = await backFetch('/contracts/' + c_id + '/bills/' + b_id + '/payments', {
        method: 'GET',
        headers: { 'Accept': 'application/json' },
    })
    items.value = data.value
    loading.value = false
}

async function addPayment() {
    await backFetch('/contracts/' + c_id + '/bills/' + b_id + '/payments', {
        method: 'POST',
        body: {
            amount_paid: amount_paid.value,
            type: type.value
        },
        headers: { 'Accept': 'application/json' },
    })
    dialog.value = false
    isEdit.value = false

    getPayments()
}

async function editPayment() {
    await backFetch('/contracts/' + c_id + '/bills/' + b_id + '/payments' + id.value, {
        method: 'PUT',
        body: {
            amount_paid: amount_paid.value,
            type: type.value
        },
        headers: { 'Accept': 'application/json' },
    })
    dialog.value = false
    isEdit.value = false

    getPayments()
}
async function deletePayment() {
    await backFetch('/contracts/' + c_id + '/bills/' + b_id + '/payments' + id.value, {
        method: 'DELETE',
        headers: { 'Accept': 'application/json' },
    })
    dialogDelete.value = false

    getPayments()
}
function editItem(item) {
    formTitle.value = 'Edit Payment'
    id.value = item.id
    amount_paid.value = amount_paid.value,
        type.value = type.value
    isEdit.value = true
    dialog.value = true
}
function deleteItem(item) {
    id.value = item.id
    dialogDelete.value = true
}
function handleSubmit() {
    if (isEdit.value) {
        editPayment()
    }
    else addPayment()
}


function resetModel() {
    amount_paid.value = 0,
        type.value = ''
}

async function showBill(id) {
    const { data } = await backFetch('/contracts/' + c_id + '/bills/' + b_id, {
        method: 'GET',
        headers: { 'Accept': 'application/json' },
    })
    bill_id.value = data.value[0].id
    seller_id.value = data.value[0].seller_id
    customer_id.value = data.value[0].customer_id
    amount.value = data.value[0].amount
    services.value = data.value[0].services
    formTitle.value = "Bill information"
    dialogBill.value = true
}
</script>

<style scoped>
.v-data-table {
    overflow-x: auto !important;

    max-width: 100%;
}
</style>

<!-- <template>
    <div>
        <p>Contract: {{ c_id }}, bill: {{ b_id }} </p>
    </div>
</template>

<script setup lang="ts">
    const { b_id } = useRoute().params
    const { c_id } = useRoute().params
    definePageMeta({
        middleware: 'auth'
})
</script>

<style scoped>

</style> -->