<template>
    <v-container justify="centre">
        <v-row justify="space-around">
            <v-card max-width="1500" elevation="12">
                <div class="text-left pt-2 pb-2 pl-2">
                    <v-toolbar>
                    <v-btn color="black" @click="formTitle = 'Add Requisite', resetModel()">
                        Add Requisite
                        <v-dialog v-model="dialog" activator="parent" width="auto">
                            <v-card>
                                <v-card-title>
                                    <span class="text-h5">{{ formTitle }}</span>
                                </v-card-title>
                                <v-form>
                                    <v-container>
                                        <v-row>
                                            <v-col cols="12">
                                                <v-text-field v-model="name" label="Company/business Name"
                                                    type="id"></v-text-field>
                                            </v-col>
                                            <v-col cols="12">
                                                <v-text-field v-model="code" label="Company/business id code"></v-text-field>
                                            </v-col>
                                            <v-col cols="12">
                                                <v-text-field v-model="tax_id" label="Tax id"></v-text-field>
                                            </v-col>
                                            <v-col cols="12">
                                                <v-text-field v-model="address" label="Address"></v-text-field>
                                            </v-col>
                                            <v-col cols="12">
                                                <v-text-field v-model="bank_account" label="Bank account"></v-text-field>
                                            </v-col>
                                            <v-col cols="12">
                                                <v-text-field v-model="creation_date" type="date" label="Company/business creation date"></v-text-field>
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
                                <v-btn color="error" @click="deleteRequisite()">Delete</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </div>
                <v-divider></v-divider>
                <v-data-table :loading="loading" :headers="headers" :items="items">
                    <template v-slot:loading>
                        <v-skeleton-loader type="table-row@10"></v-skeleton-loader>
                    </template>
                    <template v-slot:item.actions="{ item }">
                        <v-icon size="small" class="me-2" @click="editItem(item)">
                            mdi-pencil
                        </v-icon>
                        <v-icon size="small" class="me-2" @click="deleteItem(item)"> mdi-delete </v-icon>
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
const name = ref('')
const code = ref(0)
const tax_id = ref('')
const address = ref('')
const bank_account = ref('')
const creation_date = ref(Date.now())
const formTitle = ref('')
const isEdit = ref(false)
const items = ref([])
const id = ref(0)
const { c_id } = useRoute().params
const loading = ref(true)
getRequisites()

const headers = ref([
    { title: "Id", key: "id" },
    { title: "Name", key: "name" },
    { title: "Code", key: "code" },
    { title: "Tax Id", key: "tax_id" },
    { title: "Address", key: "address" },
    { title: "Bank Account", key: "bank_account" },
    { title: "Creation Date", key: "creation_date" },
    { title: 'Actions', key: 'actions', sortable: false },

])
async function getRequisites() {
    const { data } = await backFetch('/requisites', {
        method: 'GET',
        headers: { 'Accept': 'application/json' },
    })
    items.value = data.value
    loading.value = false
}

async function addRequisite() {
    await backFetch('/requisites', {
        method: 'POST',
        body: {
            name: name.value,
            code: code.value,
            tax_id: tax_id.value,
            address: address.value,
            bank_account: bank_account.value,
            creation_date: creation_date.value
        },
        headers: { 'Accept': 'application/json' },
    })
    dialog.value = false
    isEdit.value = false

    getRequisites()
}

async function editRequisite() {
    await backFetch('/requisites/' + id.value, {
        method: 'PUT',
        body: {
            name: name.value,
            code: code.value,
            tax_id: tax_id.value,
            address: address.value,
            bank_account: bank_account.value,
            creation_date: creation_date.value
        },
        headers: { 'Accept': 'application/json' },
    })
    dialog.value = false
    isEdit.value = false

    getRequisites()
}
async function deleteRequisite() {
    await backFetch('/requisites/' + id.value, {
        method: 'DELETE',
        headers: { 'Accept': 'application/json' },
    })
    dialogDelete.value = false

    getRequisites()
}
function editItem(item) {
    formTitle.value = 'Edit Requisite'
    id.value = item.id
    name.value = item.name
    code.value = item.code
    tax_id.value = item.tax_id
    address.value = item.address
    bank_account.value = item.bank_account
    creation_date.value = item.creation_date
    isEdit.value = true
    dialog.value = true
}
function deleteItem(item) {
    id.value = item.id
    dialogDelete.value = true
}
function handleSubmit() {
    if (isEdit.value) {
        editRequisite()
    }
    else addRequisite()
}

function resetModel() {
    name.value = ''
    code.value = 0
    tax_id.value = ''
    address.value = ''
    bank_account.value = ''
    creation_date.value = Date.now()
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