<script setup>
import Card from './Card.vue'
</script>
<template>
    <section class="py-8 max-w-7xl sm:px-2 lg:px-2">
        <div class="bg-white grid grid-cols-5 p-8 shadow-sm sm:rounded-lg">

            <div>
                <Card :src="'images/member.svg'" :href="route('member.create')">
                    Cadastrar membro
                </Card>
            </div>
            <div>
                <Card :src="'images/tithe.svg'" :href="route('tithe.list')">
                    Cadastrar dízimo
                </Card>
            </div>
            <div>
                <Card :src="'images/donation.svg'" :href="route('offer.create')">
                    Cadastrar ofertas
                </Card>
            </div>
            <div>
                <Card :src="'images/expenses.svg'" :href="route('expense.create')">
                    Cadastrar despesas
                </Card>
            </div>
            <div>
                <Card :src="'images/add-user.svg'">
                    Cadstrar usuário
                </Card>
            </div>
        </div>
    </section>
</template>