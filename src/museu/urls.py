from django.urls import path
from django.contrib.auth import views as auth_views

from . import views

urlpatterns = [
    path('', views.IndexView.as_view(), name='index'),
    path('contato/', views.ContatoView.as_view(), name='contato'),
    path('about/', views.SobreView.as_view(), name='about'),
    path('login/', auth_views.LoginView.as_view(), name='login'),
    path('logout/', auth_views.LogoutView.as_view(), name='logout'),
    path('categories/', views.CategoriaListView.as_view(), name='categories'),
]
