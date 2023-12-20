<template>
    <v-container justify="centre">
        <v-row justify="space-around">
            <v-card max-width="1500" elevation="12">
                <div class="text-left pt-2 pb-2 pl-2">
                    <v-toolbar>
                        <v-btn color="black" @click="formTitle = 'Add Bill', resetModel()">
                            Add Bill
                            <v-dialog v-model="dialog" activator="parent" width="auto">
                                <v-card>
                                    <v-card-title>
                                        <span class="text-h5">{{ formTitle }}</span>
                                    </v-card-title>
                                    <v-form>
                                        <v-container>
                                            <v-row>
                                                <v-col cols="12">
                                                    <v-text-field v-model="seller_id" label="Seller Id"
                                                        type="id"></v-text-field>
                                                </v-col>
                                                <v-col cols="12">
                                                    <v-text-field v-model="customer_id" label="Customer Id"></v-text-field>
                                                </v-col>
                                                <v-col cols="12">
                                                    <v-text-field v-model="amount" label="Amount paid"></v-text-field>
                                                </v-col><v-col cols="12">
                                                    <v-text-field v-model="services" label="Services given"></v-text-field>
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
                                <v-btn color="error" @click="deleteBill">Delete</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                    <v-dialog v-model="dialogContract" width="auto">
                        <v-card>
                            <v-card-title class="text-h5">{{ formTitle }}</v-card-title>
                            <v-container>
                                <v-row>
                                    <v-col cols="12">
                                        <v-text-field readonly v-model="sign_date" label="Sign date"
                                            type="date"></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-text-field readonly v-model="sign_place" label="Sign place"></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-text-field readonly v-model="customer" label="Customer"></v-text-field>
                                    </v-col><v-col cols="12">
                                        <v-text-field readonly v-model="signee" label="Signee"></v-text-field>
                                    </v-col><v-col cols="12">
                                        <v-text-field readonly v-model="price" label="Price, eur"></v-text-field>
                                    </v-col><v-col cols="12">
                                        <v-text-field readonly v-model="tax" label="Tax, %"></v-text-field>
                                    </v-col><v-col cols="12">
                                        <v-text-field readonly v-model="advance_payment_sum"
                                            label="Advance payment, eur"></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-container>
                            <v-card-actions>
                                <v-spacer />
                                <v-btn color="primary" @click="dialogContract = false">Close</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                    <v-dialog v-model="dialogRequisite" width="auto">
                        <v-card>
                            <v-card-title class="text-h5">{{ formTitle }}</v-card-title>
                            <v-container>
                                <v-row>
                                    <v-col cols="12">
                                        <v-text-field readonly v-model="name" label="Company/business Name"
                                            type="id"></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-text-field readonly v-model="code"
                                            label="Company/business id code"></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-text-field readonly v-model="tax_id" label="Tax id"></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-text-field readonly v-model="address" label="Address"></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-text-field readonly v-model="bank_account" label="Bank account"></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-text-field readonly v-model="creation_date" type="date"
                                            label="Company/business creation date"></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-container>
                            <v-card-actions>
                                <v-spacer />
                                <v-btn color="primary" @click="dialogRequisite = false">Close</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </div>
                <v-divider></v-divider>
                <v-data-table :loading="loading" :headers="headers" :items="items" class="elevation-1">
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
                            <span>Edit Bill</span>
                        </v-tooltip>
                        <v-tooltip location="top">
                            <template v-slot:activator="{ props }">
                                <v-icon v-bind="props" size="small" class="me-2" @click="deleteItem(item)"> mdi-delete
                                </v-icon>
                            </template>
                            <span>Delete Bill</span>
                        </v-tooltip>
                        <v-tooltip location="top">
                            <template v-slot:activator="{ props }">
                                <v-icon v-bind="props" size="small" @click="viewPayments(item)"> mdi-eye-outline </v-icon>
                            </template>
                            <span>Show bills' payments</span>
                        </v-tooltip>
                    </template>
                    <template v-slot:item.contract_id="{ item }">
                        <v-chip @click.stop="showContract(item)">{{ item.contract_id }}</v-chip>
                    </template>
                    <template v-slot:item.customer_id="{ item }">
                        <v-chip @click.stop="handleRequisite(item, true)">{{ item.customer_id }}</v-chip>
                    </template>
                    <template v-slot:item.seller_id="{ item }">
                        <v-chip @click.stop="handleRequisite(item, false)">{{ item.seller_id }}</v-chip>
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
const dialogRequisite = ref(false)

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
const loading = ref(true)
getBills()

const name = ref('')
const code = ref(0)
const tax_id = ref('')
const address = ref('')
const bank_account = ref('')
const creation_date = ref(Date.now())

const sign_date = ref(Date.now())
const sign_place = ref('')
const customer = ref('')
const signee = ref('')
const price = ref(0)
const tax = ref(0)
const advance_payment_sum = ref(0)

const headers = ref([
    { title: "Id", key: "id" },
    { title: "Amount", key: "amount" },
    { title: "Services", key: "services" },
    { title: "Contract Id", key: "contract_id" },
    { title: "Seller Id", key: "seller_id" },
    { title: "Customer Id", key: "customer_id" },
    { title: "User Id", key: "user_id" },
    { title: 'Actions', key: 'actions', sortable: false },

])
async function getBills() {
    const { data } = await backFetch('/contracts/' + c_id + '/bills', {
        method: 'GET',
        headers: { 'Accept': 'application/json' },
    })
    items.value = data.value
    loading.value = false
}

async function addBill() {
    await backFetch('/contracts/' + c_id + '/bills', {
        method: 'POST',
        body: {
            seller_id: seller_id.value,
            customer_id: customer_id.value,
            amount: amount.value,
            services: services.value
        },
        headers: { 'Accept': 'application/json' },
    })
    dialog.value = false
    isEdit.value = false

    getBills()
}

async function editBill() {
    await backFetch('/contracts/' + c_id + '/bills/' + id.value, {
        method: 'PUT',
        body: {
            seller_id: seller_id.value,
            customer_id: customer_id.value,
            amount: amount.value,
            services: services.value
        },
        headers: { 'Accept': 'application/json' },
    })
    dialog.value = false
    isEdit.value = false

    getBills()
}
async function deleteBill() {
    await backFetch('/bills/' + id.value, {
        method: 'DELETE',
        headers: { 'Accept': 'application/json' },
    })
    dialogDelete.value = false

    getBills()
}
function editItem(item) {
    formTitle.value = 'Edit Bill'
    id.value = item.id
    seller_id.value = item.seller_id
    customer_id.value = item.customer_id
    amount.value = item.amount
    services.value = item.services
    isEdit.value = true
    dialog.value = true
}
function deleteItem(item) {
    id.value = item.id
    dialogDelete.value = true
}
function handleSubmit() {
    if (isEdit.value) {
        editBill()
    }
    else addBill()
}

function viewPayments(item) {
    navigateTo('/contracts/' + c_id + '/bills/' + item.id + '/payments')
}

function resetModel() {
    seller_id.value = 0
    customer_id.value = 0
    amount.value = 0
    services.value = ''
}

async function showContract(item) {
    const { data } = await backFetch('/contracts/' + item.contract_id, {
        method: 'GET',
        headers: { 'Accept': 'application/json' },
    })
    sign_date.value = data.value.sign_date
    sign_place.value = data.value.sign_place
    customer.value = data.value.customer
    signee.value = data.value.signee
    price.value = data.value.price
    tax.value = data.value.tax
    advance_payment_sum.value = data.value.advance_payment_sum
    formTitle.value = "Contract Info"
    dialogContract.value = true
}

async function showRequisite(id) {
    const { data } = await backFetch('/requisites/' + id, {
        method: 'GET',
        headers: { 'Accept': 'application/json' },
    })
    name.value = data.value.name
    code.value = data.value.code
    tax_id.value = data.value.tax_id
    address.value = data.value.address
    bank_account.value = data.value.bank_account
    creation_date.value = data.value.creation_date
    dialogRequisite.value = true
}

function handleRequisite(item, customer) {
    if (customer) {
        formTitle.value = "Customer info"
        showRequisite(item.customer_id)
    }
    else {
        formTitle.value = "Seller info"
        showRequisite(item.seller_id)
    }
}
</script>

<style scoped></style>

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