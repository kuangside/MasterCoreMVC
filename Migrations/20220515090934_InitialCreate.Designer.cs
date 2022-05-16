﻿// <auto-generated />
using System;
using MasterCoreMVC.Data;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Infrastructure;
using Microsoft.EntityFrameworkCore.Migrations;
using Microsoft.EntityFrameworkCore.Storage.ValueConversion;

namespace MasterCoreMVC.Migrations
{
    [DbContext(typeof(ApplicationDbContext))]
    [Migration("20220515090934_InitialCreate")]
    partial class InitialCreate
    {
        protected override void BuildTargetModel(ModelBuilder modelBuilder)
        {
#pragma warning disable 612, 618
            modelBuilder
                .HasAnnotation("ProductVersion", "5.0.16");

            modelBuilder.Entity("MasterCoreMVC.Models.AppUser", b =>
                {
                    b.Property<int>("id")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("INTEGER");

                    b.Property<DateTime?>("create_at")
                        .HasColumnType("TEXT");

                    b.Property<DateTime?>("create_date")
                        .HasColumnType("TEXT");

                    b.Property<bool>("isactive")
                        .HasColumnType("INTEGER");

                    b.Property<string>("name")
                        .HasColumnType("TEXT");

                    b.Property<string>("password")
                        .HasColumnType("TEXT");

                    b.Property<string>("roles")
                        .HasColumnType("TEXT");

                    b.Property<DateTime?>("update_at")
                        .HasColumnType("TEXT");

                    b.Property<DateTime?>("update_date")
                        .HasColumnType("TEXT");

                    b.Property<string>("username")
                        .HasColumnType("TEXT");

                    b.HasKey("id");

                    b.ToTable("AppUser");

                    b.HasData(
                        new
                        {
                            id = 1,
                            isactive = true,
                            name = "Preedee P.",
                            password = "016623",
                            roles = "Admin",
                            username = "016623"
                        });
                });
#pragma warning restore 612, 618
        }
    }
}
