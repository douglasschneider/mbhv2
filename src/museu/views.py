from django.shortcuts import render, redirect
from django.views import generic
from django.contrib.auth.mixins import LoginRequiredMixin
from django.urls import reverse, reverse_lazy

from .models import Categoria

# Create your views here.
class IndexView(generic.TemplateView):
    template_name = 'museu/index.html'


class ContatoView(generic.TemplateView):
    template_name = 'museu/contato.html'


class SobreView(generic.TemplateView):
    template_name = 'museu/about.html'


class CategoriaListView(LoginRequiredMixin, generic.ListView):
    login_url = reverse_lazy('login')
    model = Categoria
    template_name = 'museu/categorias.html'

